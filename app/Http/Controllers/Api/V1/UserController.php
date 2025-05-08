<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Jobs\SendImageInquiryJob;
use App\Jobs\SendNameInquiryJob;
use App\Models\ActiveCode;
use App\Models\APP\contractDrafting;
use App\Models\APP\documentDrafting;
use App\Models\APP\judgement;
use App\Models\APP\Law;
use App\Models\APP\lawsuit;
use App\Models\APP\legalAdvice;
use App\Models\APP\tokil;
use App\Models\Dashboard\Estelam;
use App\Models\Profile\City;
use App\Models\Profile\EstelamToken;
use App\Models\Profile\State;
use App\Models\TypeUser;
use App\Models\User;
use App\Notifications\ActiveCode as ActiveCodeNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{

    protected function convertPersianToEnglishNumbers($string) {
        $persianNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($persianNumbers, $englishNumbers, $string);
    }

    public function login(Request $request){
        $phone      = $this->convertPersianToEnglishNumbers($request->input('phone'));
        $password   = $this->convertPersianToEnglishNumbers($request->input('password'));
        $validData = $this->validate($request, [
            'phone' => 'required|exists:users',
            'password' => 'required'
        ]);
        $user = User::wherePhone($phone)->first();
        if ($user != null) {
            if (Hash::check($password, $user->password)) {
                Auth::loginUsingId($user->id);
                if(Auth::check()){
                    auth()->user()->update([
                        'api_token' => Str::random(100)
                    ]);
                    $response = [
                        'token'=>auth()->user()->api_token,
                    ];
                    return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);
                }
            }
        }elseif (! auth()->attempt($validData)){
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
        $user = null;
        if ($user === null) {

            $validData = $this->validate($request, [
                'phone'         => 'required',
                'national_id'   => 'required|string',
                'birthday'      => 'required|string',
                'type_id'       => 'required|string',
            ]);

            $phone          = $this->convertPersianToEnglishNumbers($request->input('phone'));
            $meli_code      = $this->convertPersianToEnglishNumbers($request->input('national_id'));
            $birthday       = $this->convertPersianToEnglishNumbers($request->input('birthday'));
            //$birthday       = substr_replace(substr_replace($birthday, '/', 4, 0), '/', 7, 0);

            $token = EstelamToken::select('token', 'appname')->first();

            $headers = [
                'token:' . $token->token,
                'appname:' . $token->appname,
                'Content-Type: application/json',
            ];

            $estelamshahkar = Estelam::whereId(17)->first();
            $url     = $estelamshahkar->action_route;
                $data = [
                    "mobileNumber"  => $phone,
                    "nationalCode"  => $meli_code
                ];
            try {
                $http = Http::withHeaders($headers)->timeout(10);
                $response = $estelamshahkar->method === 'POST' ? $http->post($url, $data) : $http->send($estelamshahkar->method, $url);
                dd($response);
                if ($response->successful()) {
                    $responseData = $response->json();
                    dd($responseData);
                    if (!empty($responseData['isSuccess']) && $responseData['isSuccess'] === true) {
                        $isMatched = $responseData['data']['result']['isMatched'] ?? null;
                    }else{
                        $response = 'در حال حاضر ارتباط با سرور برقرار نشد، لطفا بعدا تلاش کنید';
                        return Response::json(['ok' => true, 'message' => 'success', 'response' => $response]);
                    }
                    } else {
                    $response = 'خطا در ارتباط با سرور. کد: ' . $response->status();
                    return Response::json(['ok' => false, 'message' => 'error', 'response' => $response]);
                    }
                }catch (\Exception $e) {
                    Log::error('CURL Error: ' . $e->getMessage());
                    $response = 'در حال حاضر ارتباط با سرور قطع می‌باشد، لطفا مجددا تلاش نمایید';
                    return Response::json(['ok' => true, 'message' => 'success', 'response' => $response]);
                }
                if ($isMatched == false){
                    $response = 'شماره موبایل وارد شده برای این کد ملی نمی باشد لطفا شماره موبایل درست وارد نمایید';
                    return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);
                }else{
                        $estelamname = Estelam::whereId(2)->first();
                        $url     = $estelamname->action_route;
                        $fullname = [
                            "nationalCode"  => $meli_code,
                            "birthDate"     => $birthday
                        ];
                    try {
                        $http = Http::withHeaders($headers)->timeout(10);

                        $response = $estelamname->method === 'POST' ? $http->post($url, $data) : $http->send($estelamname->method, $url);

                        if ($response->successful()) {
                            $data = $response->json();
                            if (!empty($data['isSuccess']) && $data['isSuccess'] === true) {
                                $result = $data['data']['result'] ?? [];

                                $name = ($result['firstName'] ?? '') . ' ' . ($result['lastName'] ?? '');
                                $gender = $result['gender'] ?? null;
                                $father_name = $result['fatherName'] ?? null;

                                Log::info('Name inquiry successful', compact('name', 'gender', 'father_name'));

                            } else {
                                $response = 'در حال حاضر ارتباط با سرور قطع می باشد، لطفا مجددا تلاش نمایید';
                                SendNameInquiryJob::dispatch($url, $estelamname->method, $headers, $fullname);
                                return Response::json(['ok' => true, 'message' => 'success', 'response' => $response]);
                            }
                        }else {
                                Log::warning('API HTTP error: ' . $response->status());
                                SendNameInquiryJob::dispatch($url, $estelamname->method, $headers, $fullname);
                                throw new \Exception('API returned HTTP error: ' . $response->status());
                            }
                        }catch (Exception $e) {
                        $response = 'در حال حاضر ارتباط با سرور قطع می باشد، لطفا مجددا تلاش نمایید';
                        SendNameInquiryJob::dispatch($url, $estelamname->method, $headers, $fullname);
                        return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);
                        }

                        $estelamimage = Estelam::whereId(7)->first();
                        $url     = $estelamimage->action_route;
                        $image = [
                            "nationalCode"  => $meli_code,
                            "birthDate"     => $birthday
                        ];
                    try {
                        $http = Http::withHeaders($headers)->timeout(10);
                        $response = $estelamimage->method === 'POST' ? $http->post($url, $image) : $http->send($estelamimage->method, $url);

                        if ($response->successful()) {
                            $data = $response->json();
                            if (!empty($data['isSuccess']) && $data['isSuccess'] === true) {
                                $result = $data['data']['result'] ?? [];

                                $imagedata = $result['image'] ?? null;

                                Log::info('Name inquiry successful', compact('name', 'gender', 'father_name'));

                            } else {
                                $response = 'در حال حاضر ارتباط با سرور قطع می باشد، لطفا مجددا تلاش نمایید';
                                SendImageInquiryJob::dispatch($url, $estelamimage->method, $headers, $image);
                                return Response::json(['ok' => true, 'message' => 'success', 'response' => $response]);
                            }
                        }else {
                            Log::warning('API HTTP error: ' . $response->status());
                            SendImageInquiryJob::dispatch($url, $estelamimage->method, $headers, $image);
                            throw new \Exception('API returned HTTP error: ' . $response->status());
                        }
                    }catch (Exception $e) {
                        $response = 'در حال حاضر ارتباط با سرور قطع می باشد، لطفا مجددا تلاش نمایید';
                        SendImageInquiryJob::dispatch($url, $estelamimage->method, $headers, $image);
                        return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);
                    }
dd($phone, $meli_code, $birthday, $name, $gender, $father_name, $imagedata);
                    $user = User::create([
                        'phone'         => $phone,
                        'national_id'   => $meli_code,
                        'birthday'      => $birthday,
                        'name'          => $name,
                        'gender'        => $gender,
                        'father_name'   => $father_name,
                        'imagedata'     => $imagedata,
                        'type_id'       => $validData['type_id'],
                    ]);
                    $user->update([
                        'api_token' => Str::random(100)
                    ]);
                    $code = ActiveCode::generateCode($user);
                    $user->notify(new ActiveCodeNotification($code, $phone));
                    $response = [
                        'token' => $user->api_token,
                    ];
            return Response::json(['ok' => true, 'message' => 'success', 'response' => $response]);
        }
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
                    , 'users.originality', 'users.marital_status', 'users.telphone', 'users.address', 'users.postalcode', 'users.image', 'users.imagedata'
                    , 'users.birth_certificate', 'states.title as state', 'cities.title as city', 'users.api_token' , 'users.type_id as type', 'users.created_at as timeset' )
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

    public function demands(){

        if (Auth::check()) {

            $judgement          = judgement::whereUser_id(Auth::user()->id)->get();
            $documentDrafting   = documentDrafting::whereUser_id(Auth::user()->id)->get();
            $contractDrafting   = contractDrafting::whereUser_id(Auth::user()->id)->get();
            $legalAdvice        = legalAdvice::whereUser_id(Auth::user()->id)->get();
            $lawsuit            = lawsuit::whereUser_id(Auth::user()->id)->get();
            $tokil              = tokil::whereUser_id(Auth::user()->id)->get();

            $response = [
                'judgement'         => $judgement,
                'documentDrafting'  => $documentDrafting,
                'contractDrafting'  => $contractDrafting,
                'legalAdvice'       => $legalAdvice,
                'lawsuit'           => $lawsuit,
                'tokil'             => $tokil,
            ];
            return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);
        }else{
            $response = [
                'user' => 'شما هنوز به حساب خود وارد نشده اید'
            ];
            return Response::json(['ok' => false , 'message' => 'faild' , 'response' => $response]);
        }

    }

    public function laws(){

        if (Auth::check()) {

            $laws          = Law::all();


            $response = [
                'laws'         => $laws,

            ];
            return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);
        }else{
            $response = [
                'user' => 'شما هنوز به حساب خود وارد نشده اید'
            ];
            return Response::json(['ok' => false , 'message' => 'faild' , 'response' => $response]);
        }

    }
}
