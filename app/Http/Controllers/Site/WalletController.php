<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Profile\WalletTransaction;
use App\Models\Profile\Workshopsign;
use Evryn\LaravelToman\Facades\Toman;
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
                $transaction->update([
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
            $wallet_transactions = DB::table('wallet_transactions as w')
                ->select('w.amount')
                ->where('ws.transactionId', '=', $authority)
                ->where('ws.user_id', '=', Auth::user()->id)
                ->where('ws.status', '=', 'pending')
                ->first();

            $payment = Toman::amount($wallet_transactions->amount)->transactionId($authority)->verify();

            if ($payment->successful()) {
                $wallet_transactions->update(['status' => 'completed' , 'referenceId' => $payment->referenceId()]);
                $wallet_transactions->user->wallet->increment('balance', $wallet_transactions->amount);

                return view('Site.Dashboard.payment-success');
            } else {
                $wallet_transactions->update(['status' => 'failed']);
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
        $amount = $request->input('amount');
        $wallet = auth()->user()->wallet;

        try {
            $wallet->withdraw($amount, 'برداشت از کیف پول');
            return response()->json(['message' => 'برداشت انجام شد']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function transactions()
    {
        return auth()->user()->wallet->transactions()->latest()->get();
    }
}

