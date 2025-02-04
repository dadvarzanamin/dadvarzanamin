<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\APP\judgement;
use App\Models\Profile\City;
use App\Models\Profile\State;
use App\Models\TypeUser;
use App\Models\User;
use App\Notifications\ActiveCode as ActiveCodeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

            $users = DB::table('users')
                ->leftjoin('states', 'users.state_id', '=', 'states.id')
                ->leftjoin('cities', 'users.city_id', '=', 'cities.id')
                ->select('users.email' , 'users.name',  'users.phone', 'users.national_id', 'users.father_name', 'users.birthday', 'users.gender', 'users.age'
                    , 'users.originality', 'users.marital_status', 'users.telphone', 'users.address', 'users.postalcode'
                    , 'users.birth_certificate', 'states.title as state', 'cities.title as city', 'users.api_token')
                ->where('users.id', '=', Auth::user()->id)
                ->first();

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

        if ($request->input('type_id')) {
            $user->type_id = $request->input('type_id');
        }elseif ($request->input('phone')) {
            $user->phone            = $request->input('phone');
        }elseif ($request->input('national_id')) {
            $user->national_id      = $request->input('national_id');
        }elseif ($request->input('name')) {
            $user->name             = $request->input('name');
        }elseif ($request->input('nationality')) {
            $user->nationality      = $request->input('nationality');
        }elseif ($request->input('gender')) {
            $user->gender           = $request->input('gender');
        }elseif ($request->input('birthday')) {
            $user->birthday         = $request->input('birthday');
        }elseif ($request->input('marital_status')) {
            $user->marital_status   = $request->input('marital_status');
        }elseif ($request->input('father_name')) {
            $user->father_name      = $request->input('father_name');
        }elseif ($request->input('postalcode')) {
            $user->postalcode       = $request->input('postalcode');
        }elseif ($request->input('telphone')) {
            $user->telphone         = $request->input('telphone');
        }elseif ($request->input('state_id')) {
            $user->state_id         = $request->input('state_id');
        }elseif ($request->input('city_id')) {
            $user->city_id          = $request->input('city_id');
        }elseif ($request->input('address')) {
            $user->address          = $request->input('address');
        }elseif ($request->input('place_id')) {
            $user->place_id = $request->input('place_id');
        }

        $user->update();
        $response = 'تغییرات با موفقیت انجام شد' ;

        return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);
    }

    public function form(Request $request){
        if($request->input(['type']) == 'judgement'){
            dd($request->input(['fields'][0]));

            // ذخیره داده‌ها در پایگاه داده
            $form = judgement::create([
                'judgement_type'        => $request->input(['fields']['judgementType']),
                'contract_type'         => $request->input(['fields']['contractType']),
                'party_one_name'        => $request->input(['fields']['partyOneName']),
                'party_two_name'        => $request->input(['fields']['partyTwoName']),
                'party_one_national_id' => $request->input(['fields']['partyOneNationalId']),
                'party_two_national_id' => $request->input(['fields']['partyTwoNationalId']),
                'uploaded_file'         => $request->input(['fields']['uploaded_file'] ?? null),
            ]);
        }


        return response()->json([
            'status' => 'success',
            'message' => 'فرم با موفقیت ثبت شد',
        ], 201);

       // return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);
    }
}
