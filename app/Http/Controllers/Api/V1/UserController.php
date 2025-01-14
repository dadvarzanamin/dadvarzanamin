<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\Profile\City;
use App\Models\Profile\State;
use App\Models\TypeUser;
use App\Models\User;
use App\Notifications\ActiveCode as ActiveCodeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class UserController extends Controller
{

    protected function convertPersianToEnglishNumbers($string) {
        $persianNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($persianNumbers, $englishNumbers, $string);
    }

    public function login(Request $request){

        $validData = $this->validate($request, [
            'phone' => 'required|exists:users',
            'password' => 'required'
        ]);


        if (! auth()->attempt($validData)){
            $response = [
                'error' => 'شماره موبایل و یا رمز عبور نادرست است',
            ];

            return Response::json(['ok' => false,'message' => 'failed','response' => $response]);

        }

//        $date = auth::user()->updated_at;
//        if ($date <= Carbon::today()->subDays( 1 )){
//            auth()->user()->update([
//                'api_token' => ''
//            ]);
//        }

        auth()->user()->update([
            'api_token' => Str::random(100)
        ]);

        $response = [
            'token'=>auth()->user()->api_token,
        ];
        return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);

    }

    public function getregister(){
        $typeuser           = TypeUser::select('id','title_fa as title')->where('id','>','3')->get()->toArray();

        //$citis              = City::select('id as city_id','title as city' , 'state_id')->get()->toArray();
        //$state              = State::select('id as state_id','title as state')->get()->toArray();
        $response = [
            'city' => $typeuser,

        ];

        return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);

    }

    public function register(Request $request)
    {

        $user = User::wherePhone($request->input('phone'))->first();
        if ($user === null) {

            $validData = $this->validate($request, [
                'phone'     => 'required',
                'name'      => 'required|string',
                'type_id'   => 'required|string',
                'password'  => 'required|string|min:8|confirmed',
            ]);

            $phone          = $this->convertPersianToEnglishNumbers($request->input('phone'));
            $password       = $this->convertPersianToEnglishNumbers($request->input('password'));

            $user = User::create([

                'phone'     => $phone,
                'name'      => $validData['name'],
                'password'  => bcrypt($password),
                'type_id'   => $validData['type_id'],

            ]);

            $user->update([
                'api_token' => Str::random(100)
            ]);

            $code = ActiveCode::generateCode($user);

            $user->notify(new ActiveCodeNotification($code , $phone));
            $response = [
                'token' => $user->api_token,
            ];

            return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);

        }else{
            $errorResponse = [
                'error' => 'شماره موبایل قبلا ثبت شده',
            ];
            return Response::json(['ok' =>false ,'message' => 'failed','response'=>$errorResponse]);
        }
    }

    public function token(Request $request){

        $token= (int)$request->input('token');

        $status = activeCode::whereCode($token)->where('expired_at' , '>' , now())->first();

        if(! $status) {
            $errorResponse = [
                'error' => 'کد فعال سازی نادرست',
            ];
            return Response::json(['ok' =>false ,'message' => 'failed','response'=>$errorResponse]);

        }else{
            $user = User::whereId($status->user_id)->first();
            $user->activeCode()->delete();
            $user->phone_verify = 1;
            $user->api_token = Str::random(100);
            $user->update();

            $response = [
                'token'=>$user->api_token,
            ];

            return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);

        }
    }

    public function remember(Request $request){

        $validData = $request->validate([
            'phone' => ['required', 'exists:users,phone']
        ]);

        $user = User::wherePhone($validData['phone'])->first();

        $code = ActiveCode::generateCode($user);

        $user->notify(new ActiveCodeNotification($code , $user->phone));

        $response = 'ارسال موفق ، کد مد نظر را وارد نمایید' ;

        return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);

    }

    public function recoverpass(Request $request)
    {
        $user = User::findOrfail(auth::user()->id);
        if ($request->input('password_old') != null){
            if (auth::user()->password = Hash::make($request->input('password_old'))) {
                $request->validate(['password' => 'required|string|min:8|confirmed']);
                $user->password = Hash::make($request->input('password'));
                $user->update();

                $response = 'رمز جدید با موفقیت ثبت شد' ;
            }else{
                $response = 'رمز وارد شده اشتباه است' ;
            }
        }else {
            $request->validate(['password' => 'required|string|min:8|confirmed']);
            $user->password = Hash::make($request->input('password'));
            $user->update();
            $response = 'رمز جدید با موفقیت ثبت شد' ;
        }


        return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);
    }

    public function profile(){

        if (Auth::check()) {
            $users = User::findOrfail(auth::user()->id);
            $states = State::all();
            $citis = City::all();

            $response = [
                'user'          => $users,
                'state'         => $states,
                'city'          => $citis,
            ];
            return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);
        }else{
            $response = [
                'user' => 'شما هنوز به حساب خود وارد نشده اید'
            ];
            return Response::json(['ok' => false , 'message' => 'faild' , 'response' => $response]);
        }

    }

    public function editprofile(Request $request){

        $user = auth::user();

        $user->type_id          = $request->input('type_id');
        $user->phone            = $request->input('phone');
        $user->national_id      = $request->input('national_id');
        $user->name             = $request->input('name');
        $user->nationality      = $request->input('nationality');
        $user->gender           = $request->input('gender');
        $user->birthday         = $request->input('birthday');
        $user->marital_status   = $request->input('marital_status');
        $user->father_name      = $request->input('father_name');
        $user->postalcode       = $request->input('postalcode');
        $user->telphone         = $request->input('telphone');
        $user->state_id         = $request->input('state_id');
        $user->city_id          = $request->input('city_id');
        $user->address          = $request->input('address');
        $user->place_id         = $request->input('place_id');

        if ($request->file('image') != null) {
            $file = $request->file('image');
            $img = Image::make($file);
            $imagePath ="images/user/";
            $imageName = md5(uniqid(rand(), true)) . md5(uniqid(rand(), true)) . '.jpg';
            $user->image = $file->move($imagePath, $imageName);
            $img->save($imagePath.$imageName);
            $img->encode('jpg');
        }
        $user->update();
        $response = 'تغییرات با موفقیت انجام شد' ;

        return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);
    }
}
