<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Profile\Wallet;
use App\Models\Profile\WalletTransaction;
use Evryn\LaravelToman\Facades\Toman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WalletController extends Controller
{
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
            ->callback(url('https://dadvarzanamin.ir/api/v1/backtoapp'))
            ->mobile(auth()->user()->phone)
            ->email(auth()->user()->email)
            ->request();

        if ($paymentRequest->successful()) {
            WalletTransaction::whereid($transaction->id)->whereUser_id(Auth::user()->id)->whereStatus('pending')->update([
                'transactionId' => $request->transactionId()
            ]);
            return response()->json([
                "ok" => true,
                "message" => "لینک پرداخت ایجاد شد.",
                "response" => [
                    "url" => "https://www.zarinpal.com/pg/StartPay/" . $transaction->transactionId(),
                    "authority" => $transaction->transactionId(),
                ],
            ]);
        }
    }

}
