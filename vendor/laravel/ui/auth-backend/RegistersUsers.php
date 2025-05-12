<?php

namespace Illuminate\Foundation\Auth;

use App\Jobs\SendImageInquiryJob;
use App\Jobs\SendNameInquiryJob;
use App\Models\ActiveCode;
use App\Http\Requests\UserRequest;
use App\Models\Dashboard\Estelam;
use App\Models\Profile\EstelamToken;
use App\Notifications\ActiveCode as ActiveCodeNotification;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function showRegistrationuserForm()
    {
        return view('Site.auth.register');
    }
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    protected function convertPersianToEnglishNumbers($string) {
        $persianNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($persianNumbers, $englishNumbers, $string);
    }

    public function registeruser(UserRequest $request)
    {

        $phone          = $this->convertPersianToEnglishNumbers($request->input('phone'));

        $user = User::wherePhone($phone)->first();
        if ($user === null) {

            $phone          = $this->convertPersianToEnglishNumbers($request->input('phone'));
            $meli_code      = $this->convertPersianToEnglishNumbers($request->input('national_id'));
            $birthday       = $this->convertPersianToEnglishNumbers($request->input('birthday'));
            $birthday       = str_replace('/', '', $birthday);

            $token = EstelamToken::select('token', 'appname')->first();
            $headers = [
                'token:' . $token->token,
                'appname:' . $token->appname,
                'Content-Type: application/json',
            ];

            $shahkar = Estelam::whereId(17)->first();
            $responseShahkar = $this->sendCurlRequest($shahkar->action_route, $shahkar->method, $headers, [
                "mobileNumber" => $phone,
                "nationalCode" => $meli_code
            ]);
            if ($responseShahkar['isSuccess'] === false) {
                $errorPath = $responseShahkar['details'][0]['path'][0] ?? '';
                $message = ($errorPath === 'nationalCode')
                    ? 'کد ملی وارد شده صحیح نمی باشد'
                    : 'در حال حاضر ارتباط با سرور شاهکار برقرار نشد، لطفا بعدا تلاش کنید';

                alert()->error('عملیات ناموفق', $message);
                return Redirect::back()->withInput();
            }
            $isMatched = $responseShahkar['data']['result']['isMatched'] ?? null;

            if ($isMatched === false) {
                $message =  'شماره موبایل وارد شده برای این کد ملی نمی باشد لطفا شماره موبایل درست وارد نمایید';
                alert()->error('عملیات ناموفق', $message);
                return Redirect::back()->withInput();
            }
            $user = User::create([
                'phone'         => $phone,
                'national_id'   => $meli_code,
                'birthday'      => substr_replace(substr_replace($birthday, '/', 4, 0), '/', 7, 0),
                'type_id'       => $request->input('type_id'),
            ]);
            $user->update([
                'api_token' => Str::random(100)
            ]);
            $user->wallet()->create(['balance' => 0]);
            $code = ActiveCode::generateCode($user);
            $user->notify(new ActiveCodeNotification($code, $phone));
            SendNameInquiryJob::dispatch($user->id, $meli_code, $birthday, $headers);
            SendImageInquiryJob::dispatch($user->id, $meli_code, $birthday, $headers);

            $request->session()->flash('auth', [
                'user_id' => $user->id,
                'reg' => 1
            ]);

            return redirect(route('phone.token'))->with(['phone' => $phone]);
        }

        alert()->error('عملیات ناموفق', 'شماره موبایل قبلا ثبت شده است');
        return Redirect::back()->withInput();
    }
    public function mobileregister(UserRequest $request)
    {
        $phone          = $this->convertPersianToEnglishNumbers($request->input('phone'));
        $password       = $this->convertPersianToEnglishNumbers($request->input('password'));

        $user = User::wherePhone($phone)->first();
        if ($user === null) {

            $users = new User();

            $users->name        = $request->input('name');
            $users->phone       = $phone;
            $users->email       = $request->input('email');
            $users->username    = $request->input('username');
            $users->type_id     = $request->input('type_user');
            $users->password    = Hash::make($password);

            $users->save();

            $user = User::wherePhone($phone)->first();

            $request->session()->flash('auth', [
                'user_id' => $user->id,
                'reg' => 1
            ]);

            $code = ActiveCode::generateCode($user);

            $user->notify(new ActiveCodeNotification($code , $phone));
            return redirect(route('phone.token'))->with(['phone' => $phone]);
        }

        session()->flash('erorr', 'شماره موبایل قبلا ثبت نام کرده است');
        return Redirect::back();
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
    function sendCurlRequest($url, $method, $headers, $data = [])
    {
        try {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            if (strtoupper($method) === 'POST') {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception(curl_error($ch));
            }

            curl_close($ch);
            return json_decode($response, true);
        } catch (\Exception $e) {
            \Log::error("CURL Request Failed: " . $e->getMessage(), [
                'url' => $url,
                'method' => $method,
                'data' => $data
            ]);
            return null;
        }
    }
}
