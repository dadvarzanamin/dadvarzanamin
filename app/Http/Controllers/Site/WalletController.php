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
        $description    = $request->description;

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
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.zarinpal.com/pg/v4/payment/request.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "merchant_id": "3640bcef-0d71-42b8-bc05-341f06755396",
                "amount": "11000",
                "callback_url": "http://example.com/verify",
                "description": "Transaction description.",
                "metadata": {
                  "mobile": "09121234567",
                  "email": "info.test@example.com"
                }
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);
        $message = $data['data']['message'];

        if ($message == 'Success'){
            $transaction->update(['status' => 'completed']);
            $transaction->user->wallet->increment('balance', $transaction->amount);
        }
        dd($response);


//          $salam =  Toman::amount($amount)
//            ->description($request->description)
//            ->callback(route('payment.callback'))
//            ->mobile(Auth::user()->phone)
//            ->email(Auth::user()->email)
//            ->request();
    }

    public function callbackpay(Request $request)
    {
        $authority  = $request->query('Authority');
        $status     = $request->query('Status');

        if ($status == "OK") {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://payment.zarinpal.com/pg/v4/payment/verify.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                "merchant_id": "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx",
                "amount": "1000",
                "authority": "A0000000000000000000000000000wwOGYpd"
                }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Accept: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            //$payment = Toman::amount($workshopsign->totalprice)->transactionId($authority)->verify();

//            if ($payment->successful()) {

//                try {
//                    $curl = curl_init();
//                    curl_setopt_array($curl, array(
//                        CURLOPT_URL => "http://api.ghasedaksms.com/v2/send/verify",
//                        CURLOPT_RETURNTRANSFER => true,
//                        CURLOPT_ENCODING => "",
//                        CURLOPT_MAXREDIRS => 10,
//                        CURLOPT_TIMEOUT => 30,
//                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                        CURLOPT_CUSTOMREQUEST => "POST",
//                        CURLOPT_POSTFIELDS => http_build_query([
//                            'type' => '1',
//                            'param1' => Auth::user()->name,
//                            'param2' => $workshopsign->title,
//                            'param3' => $workshoptype,
//                            'receptor' => Auth::user()->phone,
//                            'template' => 'workshop',
//                        ]),
//                        CURLOPT_HTTPHEADER => array(
//                            "apikey: ilvYYKKVEXlM+BAmel+hepqt8fliIow1g0Br06rP4ko",
//                            "cache-control: no-cache",
//                            "content-type: application/x-www-form-urlencoded",
//                        ),
//                    ));
//                    $response = curl_exec($curl);
//                    $err = curl_error($curl);
//                    curl_close($curl);
//                } catch (Exception $exception) {
//                }
//                return view('Site.Dashboard.payment-success');
//            } else {
//                return view('Site.Dashboard.payment-failed');
//            }
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

