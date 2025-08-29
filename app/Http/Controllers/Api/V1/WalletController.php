<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Profile\Wallet;
use App\Models\Profile\WalletTransaction;
use Evryn\LaravelToman\Facades\Toman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WalletController extends Controller
{
    public function balance()
    {
        $wallet_balance = number_format(auth()->user()->wallet->balance);
        if ($wallet_balance >=0) {
            return response()->json(
                ['isSuccess' => true,
                    'message' => 'مقادیر رکورد دریافت شد',
                    'errors' => null,
                    'status_code' => 200,
                    'result' => $wallet_balance
                ], 200);
        } else {
            return response()->json(
                ['isSuccess' => null,
                    'message' => 'مقداری یافت نشد.',
                    'errors' => true,
                    'status_code' => 500,
                ], 500);
        }
    }
    public function transactions(){

        $payments       = auth()->user()->wallet->transactions()->latest()->get();

        if ($payments) {
            return response()->json(
                ['isSuccess' => true,
                    'message' => 'مقادیر رکورد دریافت شد',
                    'errors' => null,
                    'status_code' => 200,
                    'result' => $payments
                ], 200);
        } else {
            return response()->json(
                ['isSuccess' => null,
                    'message' => 'مقداری یافت نشد.',
                    'errors' => true,
                    'status_code' => 500,
                ], 500);
        }
    }
    public function deposit(Request $request)
    {
        $request->validate([
            'amount'      => 'required|numeric|min:1000',
            'description' => 'nullable|string|max:255',
        ]);

        $amount      = $request->amount;
        $description = $request->description ?? 'شارژ کیف پول';

        if (empty(auth()->user()->email)) {
            return Response::json(['isSuccess' =>null ,'message' => 'ادرس ایمیل خالی می باشد' , 'errors' => true]);
        }

        if (empty(auth()->user()->phone)) {
            return Response::json(['isSuccess' =>null ,'message' => 'شماره موبایل خالی می باشد' , 'errors' => true]);
        }

        $transaction = auth()->user()->transactions()->create([
            'wallet_id'   => auth()->user()->wallet->id,
            'type'        => 'deposit',
            'amount'      => $amount,
            'description' => $description,
            'status'      => 'pending',
        ]);
        $paymentRequest = Toman::amount($amount)
            ->description($description)
            ->callback(url('https://dadvarzanamin.ir/api/v1/wallet/backtoapp'))
            ->mobile(auth()->user()->phone)
            ->email(auth()->user()->email)
            ->request();

        if ($paymentRequest->successful()) {
            WalletTransaction::whereid($transaction->id)->whereUser_id(Auth::user()->id)->whereStatus('pending')->update([
                'transactionId' => $paymentRequest->transactionId()
            ]);
            return response()->json([
                "ok" => true,
                "message" => "لینک پرداخت ایجاد شد.",
                "response" => [
                    "url" => "https://www.zarinpal.com/pg/StartPay/" . $paymentRequest->transactionId(),
                    "authority" => $paymentRequest->transactionId(),
                ],
            ]);
        }
    }
    public function callbackpay(Request $request)
    {
        $authority  = $request->query('Authority');
        $status     = $request->query('Status');

        if ($status == "OK") {
            $wallet_transactions = WalletTransaction::select('id','amount','user_id')
                ->where('transactionId', '=', $authority)
                ->where('status', '=', 'pending')
                ->first();

            Auth::loginUsingId($wallet_transactions->user_id);

            $payment = Toman::amount($wallet_transactions->amount)->transactionId($authority)->verify();

            if ($payment->successful()) {
                WalletTransaction::whereId($wallet_transactions->id)->whereUser_id(Auth::user()->id)->whereStatus('pending')
                    ->update(['status' => 'completed' , 'referenceId' => $payment->referenceId()]);
                Wallet::whereUser_id(Auth::user()->id)->update(['balance' => auth()->user()->wallet->balance + $wallet_transactions->amount]);
                return view('Api.payment-success');

//                    return response()->json(
//                        ['isSuccess' => true,
//                            'message' => 'کیف پول شما با موفقیت شارژ شد ',
//                            'errors' => null,
//                            'status_code' => 200,
//                            'result' => auth()->user()->wallet->balance
//                        ], 200);

            } else {
                WalletTransaction::whereid($wallet_transactions->id)->whereUser_id(Auth::user()->id)->whereStatus('pending')
                    ->update(['status' => 'failed']);
                return view('Api.payment-failed');

//                return response()->json(
//                    ['isSuccess' => null,
//                        'message' => 'متاسفانه کیف پول شما شارژ نشد، در صورت کم شدن مبلغ از حساب شما تا 72 ساعت آیند به حساب شما باز می گردد.',
//                        'errors' => true,
//                        'status_code' => 500,
//                    ], 500);
            }
        } else {
            return view('Api.payment-failed');
//            return response()->json(
//                ['isSuccess' => null,
//                    'message' => 'متاسفانه تراکنش موفقیت آمیز نبود.',
//                    'errors' => true,
//                    'status_code' => 500,
//                ], 500);
        }

    }
    public function withdraw(Request $request)
    {
        $amount = $request->input('totalFinal');
        $invoiceIds = $request->input('invoice_ids', []);

        $invoiceIds = (array)$request->input('invoice_ids');

        $paidInvoices = Invoice::whereIn('id', $invoiceIds)
            ->where('user_id', auth()->id())
            ->where('price_status', 4)
            ->get();

        if ($paidInvoices->isNotEmpty()) {
            return response()->json(
                ['isSuccess' => null,
                    'message' => 'شما قبلا فاکتور(ها) رو پرداخت کرده اید',
                    'errors' => true,
                    'status_code' => 500,
                    'result' => $paidInvoices
                ], 500);
        } else {

            $user = auth()->user();
            $wallet = $user->wallet;

            if ($wallet->balance < $amount) {
                return response()->json(
                    ['isSuccess' => null,
                        'message' => 'موجودی کافی نیست.',
                        'errors' => true,
                        'status_code' => 500,
                        'result' => $wallet->balance
                    ], 500);
            }

            $transaction = $user->transactions()->create([
                'wallet_id' => $wallet->id,
                'type' => 'withdraw',
                'amount' => $amount,
                'description' => $request->description,
                'status' => 'completed',
            ]);

            $wallet->decrement('balance', $amount);

            $invoiceIds = (array)$request->input('invoice_ids');
            Invoice::whereIn('id', $invoiceIds)
                ->where('user_id', auth()->id())
                ->update(['price_status' => 4]);

            return response()->json(
                ['isSuccess' => true,
                    'message' => 'مبلغ با موفقیت از کیف پول برداشت شد.',
                    'errors' => null,
                    'status_code' => 200,
                    'result' => $wallet->balance,
                    'redirect_url' => route('order'),
                ], 200);
        }
    }

}
