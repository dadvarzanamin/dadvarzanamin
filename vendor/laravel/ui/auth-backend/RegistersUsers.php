<?php

namespace Illuminate\Foundation\Auth;

use App\Models\ActiveCode;
use App\Http\Requests\UserRequest;
use App\Notifications\ActiveCode as ActiveCodeNotification;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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
        $password       = $this->convertPersianToEnglishNumbers($request->input('password'));

        $user = User::wherePhone($phone)->first();
        if ($user === null) {

            $users = new User();

            $users->name        = $request->input('name');
            $users->phone       = $request->input('phone');
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

        alert()->error('عملیات ناموفق', 'شماره موبایل قبلا ثبت شده است');
        return Redirect::back();
    }
    public function mobileregister(UserRequest $request)
    {
        $phone          = $this->convertPersianToEnglishNumbers($request->input('phone'));
        $password       = $this->convertPersianToEnglishNumbers($request->input('password'));

        $user = User::wherePhone($phone)->first();
        if ($user === null) {

            $users = new User();

            $users->name        = $request->input('name');
            $users->phone       = $request->input('phone');
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
}
