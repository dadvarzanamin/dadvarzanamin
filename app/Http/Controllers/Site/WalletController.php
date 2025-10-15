<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Profile\Wallet;
use App\Models\Profile\WalletTransaction;
use App\Models\Profile\Workshopsign;
use Evryn\LaravelToman\Facades\Toman;
use Ghasedak\Exceptions\HttpException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class WalletController extends Controller
{
    public function pay(Request $request)
    {
        $request->validate([
            'amount'        => 'required|numeric|min:1000',
            'description'   => 'nullable|string|max:255',
        ]);

        $user           = auth()->user();
        $amount         = $request->amount;
        if($request->description == null){
            $description = 'شارژ کیف پول';
        }else {
            $description = $request->description;
        }
        $transaction = $user->transactions()->create([
            'wallet_id'     => $user->wallet->id,
            'type'          => 'deposit',
            'amount'        => $amount,
            'description'   => $description,
            'status'        => 'pending',
        ]);
        if (Auth::user()->email == null)
        {
            alert()->error('', 'اطلاعات ادرس ایمیل وارد نشده است، به قسمت تنظیمات حساب مراجعه کنید');
            return Redirect::back();

        }elseif (Auth::user()->phone == null){
            alert()->error('', 'اطلاعات شماره همراه وارد نشده است، به قسمت تنظیمات حساب مراجعه کنید');
            return Redirect::back();

        }
        $request = Toman::amount($amount)
            ->description($description)
            ->callback(route('payment.callback'))
            ->mobile(Auth::user()->phone)
            ->email(Auth::user()->email)
            ->request();

        if ($request->successful()) {
            WalletTransaction::whereid($transaction->id)->whereUser_id(Auth::user()->id)->whereStatus('pending')->update([
                'transactionId' => $request->transactionId()
            ]);
            return $request->pay();
        }

//        if ($request->successful()) {
//            $transaction->update(['status' => 'completed']);
//            $transaction->user->wallet->increment('balance', $transaction->amount);
//        }

    }

    public function callbackpay(Request $request)
    {
        $authority  = $request->query('Authority');
        $status     = $request->query('Status');

        if ($status == "OK") {
            $wallet_transactions = WalletTransaction::
                 select('id','amount')
                ->where('transactionId', '=', $authority)
                ->where('user_id', '=', Auth::user()->id)
                ->where('status', '=', 'pending')
                ->first();

            $payment = Toman::amount($wallet_transactions->amount)->transactionId($authority)->verify();

            if ($payment->successful()) {
                WalletTransaction::whereid($wallet_transactions->id)->whereUser_id(Auth::user()->id)->whereStatus('pending')
                    ->update(['status' => 'completed' , 'referenceId' => $payment->referenceId()]);
                $wallet = Wallet::whereUser_id(Auth::user()->id)->first();
                $amount_total = $wallet->balance + $wallet_transactions->amount;
                Wallet::whereUser_id(Auth::user()->id)->update(['balance' => $amount_total]);
                return view('Site.Dashboard.payment-success');
            } else {
                WalletTransaction::whereid($wallet_transactions->id)->whereUser_id(Auth::user()->id)->whereStatus('pending')
                    ->update(['status' => 'failed']);
                return view('Site.Dashboard.payment-failed');
            }
        } else {
            return view('Site.Dashboard.payment-failed');
        }
    }

    public function show()
    {
        return response()->json(auth()->user()->wallet);
    }

    public function deposit(Request $request)
    {
        $amount = $request->input('amount');
        $wallet = auth()->user()->wallet;

        $wallet->deposit($amount, 'شارژ کیف پول');

        return response()->json(['message' => 'شارژ انجام شد']);
    }

    public function withdraw(Request $request)
    {

        $amount     = $request->input('totalFinal');
        $invoiceIds = $request->input('invoice_ids', []);

        if (!is_array($invoiceIds)) {
            $invoiceIds = explode(',', $invoiceIds);
        }

        $user = auth()->user();
        $wallet = $user->wallet;

        if ($wallet->balance < $amount) {
            return response()->json([
                'isSuccess'    => false,
                'message'      => 'موجودی کافی نیست. در حال انتقال به صفحه پرداخت...',
                'redirect_url' => route('pay', ['user' => $user->id, 'amount' => $amount]),
            ]);

        }

        $transaction = $user->transactions()->create([
            'wallet_id'     => $wallet->id,
            'type'          => 'withdraw',
            'amount'        => $amount,
            'description'   => $request->description,
            'status'        => 'completed',
        ]);

        $wallet->decrement('balance', $amount);

        Invoice::whereIn('id', $invoiceIds)
            ->where('user_id', auth()->id())
            ->update(['price_status' => 4]);

        $invoice = Invoice::leftjoin('workshops' ,'workshops.id' , '=' , 'invoices.product_id')
            ->leftjoin('users' , 'users.id' , '=' , 'invoices.user_id')
            ->select('workshops.title' , 'workshops.date' , 'users.phone' , 'users.name' , 'invoices.product_type')
            ->where('invoices.id', $invoiceIds)
            ->where('invoices.user_id', auth()->id())
            ->first();

        if ($invoice->product_type == 'workshop') {
             try {
                    $headers = array(
                        'apikey: ilvYYKKVEXlM+BAmel+hepqt8fliIow1g0Br06rP4ko',
                        'Accept: application/json',
                        'Content-Type: application/x-www-form-urlencoded',
                        'charset: utf-8'
                    );

                    $params = http_build_query([
                        'type' => 1,
                        'param1' => $invoice->name,
                        'param2' => $invoice->title,
                        'param3' => $invoice->date,
                        'receptor' => $invoice->phone,
                        'template' => 'workshop',
                    ]);

                    $url = 'http://api.ghasedaksms.com/v2/send/verify';

                    $method = 'POST';

                    $init = curl_init();
                    curl_setopt($init, CURLOPT_URL, $url);
                    curl_setopt($init, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($init, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($init, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($init, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($init, CURLOPT_CUSTOMREQUEST, $method);
                    curl_setopt($init, CURLOPT_POSTFIELDS, $params);

                    $result = curl_exec($init);
                    $code = curl_getinfo($init, CURLINFO_HTTP_CODE);
                    $curl_errno = curl_errno($init);
                    $curl_error = curl_error($init);
                    if ($curl_errno) {
                        throw new HttpException($curl_error, $curl_errno);
                    }

                    $json_result = json_decode($result);
                    dd($json_result);
                return response()->json(
                    ['isSuccess' => true,
                        'message' => 'مبلغ با موفقیت از کیف پول برداشت شد.',
                        'errors' => null,
                        'status_code' => 200,
                        'result' => $wallet->balance,
                        'redirect_url' => route('order'),
                    ], 200);

            } catch (\Throwable $e) {
                Log::error('Exception: ' . $e->getMessage());
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        return response()->json(
            ['isSuccess'        => true,
                'message'       => 'مبلغ با موفقیت از کیف پول برداشت شد.',
                'errors'        => null,
                'status_code'   => 200,
                'result'        => $wallet->balance,
                'redirect_url' => route('order'),
            ], 200);
    }

    public function transactions()
    {
        return auth()->user()->wallet->transactions()->latest()->get();
    }
}

