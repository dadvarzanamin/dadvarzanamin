<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\Company;
use App\Models\Dashboard\Estelam;
use App\Models\Dashboard\notif_user;
use App\Models\Dashboard\Subestelam;
use App\Models\Menu;
use App\Models\message;
use App\Models\Payment;
use App\Models\Profile\Bank;
use App\Models\Profile\EstelamToken;
use App\Models\Profile\Log_estelam;
use App\Models\Profile\Notif;
use App\Models\Profile\Workshop;
use App\Models\Profile\Workshopsign;
use App\Models\User;
use App\Notifications\ActiveCode as ActiveCodeNotification;
use Evryn\LaravelToman\CallbackRequest;
use Evryn\LaravelToman\Facades\Toman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $notifs = $user->notifs()->whereActive(1)->orderBy('id', 'DESC')->get();
        $companies = Company::first();
        $dashboardmenus = Menu::select('id', 'title', 'slug', 'class', 'priority')->MenuDashboard()->orderBy('priority')->get();
        return view('Site.Dashboard.profile')->with(compact('companies', 'dashboardmenus', 'notifs'));

    }

    public function queries(Request $request)
    {
        $token = EstelamToken::select('token', 'appname')->first();

        if ($request->input('formId') == 11) {
            try {
/////////////////////////////////////
                $estelam = Estelam::whereId(1)->first();
                $url = $estelam->action_route;
                $data = [
                    'postCode' => $request->input('postCode')
                ];

                $headers = [
                    'apikey:' . $token->token,
                    'appname:' . $token->appname,
                    'Content-Type: application/json',
                ];
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $postresponse = curl_exec($ch);
                curl_close($ch);
                $responseData = json_decode($postresponse, true);

                $address = $responseData['description']['addressByPostcode']['message']['address'];
///////////////////////////////////////////
                $estelam = Estelam::whereId(2)->first();
                $url = $estelam->action_route;
                $data = [
                    'nationalID' => $request->input('nationalID'),
                    'birthDate' => $request->input('birthDate'),
                ];
                $headers = [
                    'apikey:' . $token->token,
                    'appname:' . $token->appname,
                    'Content-Type: application/json',
                ];
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $nationalresponse = curl_exec($ch);
                curl_close($ch);
                $responseData = json_decode($nationalresponse, true);

                $nationalCode = $request->input('nationalID');
                $firstName = $responseData['description']['mixedInquiry']['personalInfo']['name'];
                $lastName = $responseData['description']['mixedInquiry']['personalInfo']['family'];
                $fatherName = $responseData['description']['mixedInquiry']['personalInfo']['fatherName'];
                $birthDate = $request->input('birthDate');
                $gender = $responseData['description']['mixedInquiry']['personalInfo']['gender'];
                $alive = $responseData['description']['mixedInquiry']['vitalInfo']['vitalStatus'];

                if ($gender == 'MALE') {
                    $gender = 'مرد';
                } elseif ($gender == 'FEMALE') {
                    $gender = 'زن';
                }
                if ($alive == 'ALIVE') {
                    $alive = 'در قید حیات';
                } elseif ($alive == 'DEAD') {
                    $alive = 'فوت شده';
                }
/////////////////////////////////////
                $estelam = Estelam::whereId(7)->first();
                $url = $estelam->action_route;
                $data = [
                    'nationalID' => $request->input('nationalID'),
                    'birthDate' => $request->input('birthDate'),
                ];

                $headers = [
                    'apikey:' . $token->token,
                    'appname:' . $token->appname,
                    'Content-Type: application/json',
                ];
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $imgresponse = curl_exec($ch);
                curl_close($ch);
                $responseData = json_decode($imgresponse, true);

                $image = $responseData['description']['nationalCardImageInquiry']['image'];
                $image = '<img src="data:image/jpeg;base64,' . $image . '">';

                $result = [
                    'کد ملی' => $nationalCode,
                    'نام' => $firstName,
                    'نام خانوادگی' => $lastName,
                    'نام پدر' => $fatherName,
                    'تاریخ تولد' => $birthDate,
                    'جنسیت' => $gender,
                    'وضعیت حیات' => $alive,
                    'تصویر' => $image,
                    'آدرس' => $address,
                ];
                return response()->json(['response' => $result]);
            } catch (Exception $e) {

                $message = 'خطای سیستم،لطفا بعدا مجدد تلاش نمایید ';
                return response()->json(['error' => $message], 500);
            }
        }
//////////////////////////////////////////////
        $estelam = Estelam::whereId($request->input('formId'))->first();

        try {
            if ($estelam->method == 'GET') {
                $url = $estelam->action_route . '?companyNationalCode=' . $request->input('companyNationalCode');

            } elseif ($estelam->method == 'POST') {
                $url = $estelam->action_route;
            }
            $data = $request->all();
            $headers = [
                'apikey:' . $token->token,
                'appname:' . $token->appname,
                'Content-Type: application/json',
            ];
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $estelam->method);
            if ($estelam->method == 'POST') {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($ch);
            curl_close($ch);
            $responseData = json_decode($response, true);

            $logs = new Log_estelam();
            $logs->title = $estelam->title_fa;
            $logs->request = json_encode($data);
            $logs->response = json_encode($responseData);
            $logs->action_route = $estelam->action_route;
            $logs->date = jdate()->format('Y/m/d');
            $logs->user_id = Auth::user()->id;
            $logs->save();


            if ($request->input('formId') == 1) {
                $address = $responseData['description']['addressByPostcode']['message']['address'];
                $status = $responseData['status'];
                $message = $responseData['description']['addressByPostcode']['message'];
                $result = [
                    'آدرس' => $address
                ];
            } elseif ($request->input('formId') == 2) {
                $nationalCode = $request->input('nationalID');
                $firstName = $responseData['description']['mixedInquiry']['personalInfo']['name'];
                $lastName = $responseData['description']['mixedInquiry']['personalInfo']['family'];
                $fatherName = $responseData['description']['mixedInquiry']['personalInfo']['fatherName'];
                $birthDate = $request->input('birthDate');
                $gender = $responseData['description']['mixedInquiry']['personalInfo']['gender'];
                $alive = $responseData['description']['mixedInquiry']['vitalInfo']['vitalStatus'];

                if ($gender == 'MALE') {
                    $gender = 'مرد';
                } elseif ($gender == 'FEMALE') {
                    $gender = 'زن';
                }
                if ($alive == 'ALIVE') {
                    $alive = 'در قید حیات';
                } elseif ($alive == 'DEAD') {
                    $alive = 'فوت شده';
                }

                $result = [
                    'کد ملی' => $nationalCode,
                    'نام' => $firstName,
                    'نام خانوادگی' => $lastName,
                    'نام پدر' => $fatherName,
                    'تاریخ تولد' => $birthDate,
                    'جنسیت' => $gender,
                    'وضعیت حیات' => $alive,
                ];
                //dd($nationalCode , $firstName , $lastName , $fatherName , $birthDate , $alive , $gender);
            } elseif ($request->input('formId') == 3) {

                $ownerName = $responseData['description']['inquiryCard']['cardInfo']['ownerName'];
                $depositNumber = $responseData['description']['inquiryCard']['cardInfo']['depositNumber'];
                $bank = $responseData['description']['inquiryCard']['cardInfo']['bank'];
                $type = $responseData['description']['inquiryCard']['cardInfo']['type'];

                $result = [
                    'نام مالک کارت' => $ownerName,
                    'شماره حساب' => $depositNumber,
                    'نام بانک' => $bank,
                    'نوع حساب' => $type,
                ];
            } elseif ($request->input('formId') == 4) {

                $ownerName = $responseData['description']['inquiryCard']['cardInfo']['ownerName'];
                $depositNumber = $responseData['description']['inquiryCard']['cardInfo']['depositNumber'];
                $bank = $responseData['description']['inquiryCard']['cardInfo']['bank'];
                $type = $responseData['description']['inquiryCard']['cardInfo']['type'];

                $result = [
                    'نام مالک کارت' => $ownerName,
                    'شماره حساب' => $depositNumber,
                    'نام بانک' => $bank,
                    'نوع حساب' => $type,
                ];
            } elseif ($request->input('formId') == 5) {

                $ownerName = $responseData['description']['inquiryCard']['cardInfo']['ownerName'];
                $depositNumber = $responseData['description']['inquiryCard']['cardInfo']['depositNumber'];
                $bank = $responseData['description']['inquiryCard']['cardInfo']['bank'];
                $type = $responseData['description']['inquiryCard']['cardInfo']['type'];

                $result = [
                    'نام مالک کارت' => $ownerName,
                    'شماره حساب' => $depositNumber,
                    'نام بانک' => $bank,
                    'نوع حساب' => $type,
                ];
            } elseif ($request->input('formId') == 6) {

                $ibanCheckResult = $responseData['description']['ibanIdentityInquiry']['respObject']['ibanCheckResult'];

                $result = [
                    ' وضعیت حساب ' => $ibanCheckResult,
                ];
            } elseif ($request->input('formId') == 7) {

                $image = $responseData['description']['nationalCardImageInquiry']['image'];
                $image = '<img src="data:image/jpeg;base64,' . $image . '">';
                $result = [
                    '  تصویر ' => $image,
                ];
            } elseif ($request->input('formId') == 8) {

                $message = $responseData['description']['details']['message'];
                $result = [
                    '  مانده حساب ' => $message,
                ];
            } elseif ($request->input('formId') == 9) {

                $message = $responseData['description']['details']['message'];
                $result = [
                    '  مانده حساب ' => $message,
                ];
            } elseif ($request->input('formId') == 12) {


                $title = $responseData['description']['companyInfo']['news'][0]['title'];
                $description = $responseData['description']['companyInfo']['news'][0]['description'];
                $companyId = $responseData['description']['companyInfo']['news'][0]['companyId'];
                $capitalTo = $responseData['description']['companyInfo']['news'][0]['capitalTo'];


                $result = [
                    ' عنوان ' => $title,
                    ' توضیحات ' => $description,
                    ' شماره ثبت ' => $companyId,
                    ' سرمایه اولیه ' => $capitalTo,
                ];

            }
            return response()->json(['response' => $result]);

        } catch (Exception $e) {

            $message = 'اطلاعات پاک نشد،لطفا بعدا مجدد تلاش نمایید ';
            return response()->json(['error' => $message], 500);
        }
    }

    public function estelam()
    {
        $user = Auth::user();
        $notifs = $user->notifs()->whereActive(1)->orderBy('id', 'DESC')->get();
        $estelams = Estelam::whereStatus(4)->get();
        $subestelams = Subestelam::whereStatus(4)->get();
        $companies = Company::first();
        $dashboardmenus = Menu::select('id', 'title', 'slug', 'class', 'priority')->MenuDashboard()->orderBy('priority')->get();

        return view('Site.Dashboard.estelam')->with(compact('companies', 'dashboardmenus', 'notifs', 'estelams', 'subestelams'));

    }

    public function usernotif()
    {
        $user = Auth::user();
        $notifs = $user->notifs()->orderBy('id', 'DESC')->get();
        $usernotifs = notif_user::whereUser_id($user->id)->get();
        $companies = Company::first();
        $dashboardmenus = Menu::select('id', 'title', 'slug', 'class', 'priority')->MenuDashboard()->orderBy('priority')->get();

        return view('Site.Dashboard.usernotif')->with(compact('companies', 'dashboardmenus', 'notifs', 'usernotifs'));

    }

    public function message()
    {

        $companies = Company::first();
        $user = Auth::user();
        $notifs = $user->notifs()->whereActive(1)->orderBy('id', 'DESC')->get();
        $dashboardmenus = Menu::select('id', 'title', 'slug', 'class', 'priority')->MenuDashboard()->orderBy('priority')->get();
        $messages = message::leftjoin('users', 'users.id', '=', 'messages.sender_id')
            ->select('messages.description', 'messages.active', 'users.name', 'users.image', 'messages.created_at as date')
            ->whereUser_id(Auth::user()->id)
            ->whereActive(1)
            ->orderBy('messages.id', 'DESC')
            ->groupBy('messages.sender_id', 'messages.description', 'messages.active', 'users.name', 'users.image', 'date')
            ->get();

        return view('Site.Dashboard.message')->with(compact('companies', 'messages', 'dashboardmenus', 'notifs'));

    }

    public function setting()
    {

        $companies = Company::first();
        $user = Auth::user();
        $notifs = $user->notifs()->whereActive(1)->orderBy('id', 'DESC')->get();
        $dashboardmenus = Menu::select('id', 'title', 'slug', 'class', 'priority')->MenuDashboard()->orderBy('priority')->get();
        $banks = Bank::whereUser_id(Auth::user()->id)->get();
        $payments = Payment::whereUser_id(Auth::user()->id)->get();

        return view('Site.Dashboard.settings')->with(compact('companies', 'dashboardmenus', 'banks', 'notifs', 'payments'));

    }

    public function workshop()
    {

        $companies = Company::first();
        $user = Auth::user();
        $notifs = $user->notifs()->whereActive(1)->orderBy('id', 'DESC')->get();
        $dashboardmenus = Menu::select('id', 'title', 'slug', 'class', 'priority')->MenuDashboard()->orderBy('priority')->get();
        $payments = Payment::whereUser_id(Auth::user()->id)->get();
        $workshops = Workshop::whereStatus(4)->get();
        $workshopsigns = DB::table('workshops')
            ->join('workshopsigns', 'workshops.id', '=', 'workshopsigns.workshop_id')
            ->select('workshops.title', 'workshops.price', 'workshops.date', 'workshopsigns.typeuse', 'workshopsigns.pricestatus')
            ->where('workshopsigns.user_id', '=', Auth::user()->id)
            ->where('workshopsigns.pricestatus', '!=', null)
            ->get();
        $workshoppays = DB::table('workshops')
            ->join('workshopsigns', 'workshops.id', '=', 'workshopsigns.workshop_id')
            ->select('workshops.title', 'workshops.price', 'workshops.date', 'workshopsigns.typeuse', 'workshopsigns.pricestatus')
            ->where('workshopsigns.user_id', '=', Auth::user()->id)
            ->get();

        return view('Site.Dashboard.workshop')->with(compact('companies', 'dashboardmenus', 'workshoppays', 'workshopsigns', 'notifs', 'workshops', 'payments'));

    }

    public function userrequest()
    {

        $companies = Company::first();
        $user = Auth::user();
        $notifs = $user->notifs()->whereActive(1)->orderBy('id', 'DESC')->get();
        $dashboardmenus = Menu::select('id', 'title', 'slug', 'class', 'priority')->MenuDashboard()->orderBy('priority')->get();

        return view('Site.Dashboard.userrequest')->with(compact('companies', 'dashboardmenus', 'notifs'));

    }

    public function creatbankaccount(Request $request)
    {
        $request->validate([
            'name' => ['string'],
            'bank_account' => ['numeric'],
            'bank_card' => ['numeric'],
            'bank_sheba' => ['string', 'min:10'],
        ]);

        $bank = new Bank();

        $bank->bank_name = $request->input('bank_name');
        $bank->bank_account = $request->input('bank_account');
        $bank->bank_card = $request->input('bank_card');
        $bank->bank_sheba = $request->input('bank_sheba');
        $bank->user_id = Auth::user()->id;

        $bank->save();

        return Redirect::back();
    }

    public function workshopsign(Request $request)
    {
        $workshopsigns = DB::table('workshops')
            ->join('workshopsigns', 'workshops.id', '=', 'workshopsigns.workshop_id')
            ->select('workshops.title', 'workshops.price', 'workshops.date', 'workshopsigns.typeuse', 'workshopsigns.pricestatus')
            ->where('workshopsigns.user_id', '=', Auth::user()->id)
            ->where('workshopsigns.pricestatus', '=', 4)
            ->first();
//        dd($request->input('workshopid'));

        if ($workshopsigns != null) {

            alert()->error('', 'شما قبلا در این دوره ثبت نام کرده اید');

            return Redirect::back();

        } else {
            $request->validate([
                'workshopid' => ['numeric'],
                'typeuse' => ['numeric'],
            ]);

            $Workshopsign = new Workshopsign();

            $Workshopsign->workshop_id = $request->input('workshopid');
            $Workshopsign->typeuse = $request->input('typeuse');
            $Workshopsign->price = $request->input('price');
            $Workshopsign->pricestatus = $request->input('pricestatus');
            $Workshopsign->user_id = Auth::user()->id;

            $Workshopsign->save();
            return Redirect::route('paymentpage', ['workshopid' => $Workshopsign->workshop_id]);
        }
    }

    public function paymentpage(Request $request)
    {
        $companies = Company::first();
        $user = Auth::user();
        $notifs = $user->notifs()->whereActive(1)->orderBy('id', 'DESC')->get();
        $dashboardmenus = Menu::select('id', 'title', 'slug', 'class', 'priority')
            ->MenuDashboard()
            ->orderBy('priority')
            ->get();

        $workshopid = $request->query('workshopid');

        $workshopsigns = DB::table('workshops')
            ->join('workshopsigns', 'workshops.id', '=', 'workshopsigns.workshop_id')
            ->select('workshops.title', 'workshops.price', 'workshops.date', 'workshopsigns.typeuse', 'workshopsigns.workshop_id')
            ->where('workshopsigns.user_id', '=', $user->id)
            ->where('workshopsigns.workshop_id', '=', $workshopid)
            ->whereNull('workshopsigns.pricestatus')
            ->first();
//        dd($workshopsigns);

        return view('Site.Dashboard.paymentpage')->with(compact('companies', 'dashboardmenus', 'notifs', 'workshopsigns'));
    }


    public function pay(Request $request)
    {
//        dd($request->all());
        // ابتدا چک کنید که ایمیل و شماره تلفن وارد شده است
        if (Auth::user()->email == null) {
            alert()->error('', 'اطلاعات ادرس ایمیل وارد نشده است، به قسمت تنظیمات حساب مراجعه کنید');
            return Redirect::back();

        } elseif (Auth::user()->phone == null) {
            alert()->error('', 'اطلاعات شماره همراه وارد نشده است، به قسمت تنظیمات حساب مراجعه کنید');
            return Redirect::back();
        } else {
            // دریافت workshopid از درخواست یا از session
            $workshopid = $request->query('workshopid');

            $workshopsigns = DB::table('workshops')
                ->join('workshopsigns', 'workshops.id', '=', 'workshopsigns.workshop_id')
                ->select('workshops.title', 'workshops.price', 'workshops.id', 'workshops.date', 'workshopsigns.typeuse', 'workshopsigns.workshop_id') // اضافه کردن workshop_id
                ->where('workshopsigns.user_id', '=', Auth::user()->id)
                ->where('workshopsigns.workshop_id', '=', $workshopid) // افزودن شرط برای workshopid
                ->where('workshops.id', '=', $workshopid) // اضافه کردن این خط
                ->whereNull('workshopsigns.pricestatus') // فقط دوره‌هایی که پرداخت نشده‌اند
                ->first();
            if ($workshopsigns) {
                // تنظیم پرداخت
                $request = Toman::amount($workshopsigns->price)
                    ->description($workshopsigns->title)
                    ->callback(route('payment.callback'))
                    ->mobile(Auth::user()->phone)
                    ->email(Auth::user()->email)
                    ->request();

                if ($request->successful()) {
                    // ذخیره اطلاعات تراکنش برای تایید بعدی
                    $transactionId = $request->transactionId();

                    // ریدایرکت به URL پرداخت
                    return $request->pay();
                } elseif ($request->failed()) {
                    // هندل کردن خطای درخواست پرداخت
                    alert()->error('', 'خطایی در ارسال درخواست پرداخت به وجود آمد.');
                    return Redirect::back();
                }
            } else {
                alert()->error('', 'دوره‌ای برای پرداخت یافت نشد.');
                return Redirect::back();
            }
        }
    }


    public function callbackpay(CallbackRequest $request)
    {
//        \Log::info('Payment callback received', ['request' => $request->all()]);

        try {
            $workshopsign = DB::table('workshops')
                ->join('workshopsigns', 'workshops.id', '=', 'workshopsigns.workshop_id')
                ->select('workshops.id', 'workshops.title', 'workshops.price', 'workshops.date', 'workshopsigns.typeuse', 'workshopsigns.id as workshopsign_id')
                ->where('workshopsigns.user_id', '=', Auth::user()->id)
                ->whereNull('workshopsigns.pricestatus')
                ->orderBy('workshopsigns.id', 'DESC')
                ->first();

//            \Log::info('Workshop sign retrieved', ['workshopsign' => $workshopsign]);

            if (!$workshopsign) {
                throw new \Exception('No unpaid workshop found for the user.');
            }

            $payment = $request->amount($workshopsign->price)->verify();
//            \Log::info('Payment verification result', ['success' => $payment->successful(), 'alreadyVerified' => $payment->alreadyVerified()]);

            if ($payment->successful() || $payment->alreadyVerified()) {
                DB::beginTransaction();

                $updatedRows = DB::table('workshopsigns')
                    ->where('id', $workshopsign->workshopsign_id)
                    ->update([
                        'referenceId' => $payment->referenceId(),
                        'pricestatus' => '4',
                        'price' => $workshopsign->price
                    ]);

//                \Log::info('Database update result', ['updatedRows' => $updatedRows]);

                if ($updatedRows === 0) {
                    throw new \Exception('Failed to update the database.');
                }

                DB::commit();

                // Send SMS notification
                $this->sendSmsNotification($workshopsign);

                return view('Site.Dashboard.payment-success');
            }

            // If payment is not successful
            DB::table('workshopsigns')
                ->where('id', $workshopsign->workshopsign_id)
                ->update([
                    'referenceId' => $request->transactionId(),
                    'pricestatus' => '3',
                    'price' => '111'
                ]);

            return view('Site.Dashboard.payment-failed');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error in callbackpay', ['error' => $e->getMessage()]);
            return view('Site.Dashboard.payment-failed')->with('error', $e->getMessage());
        }
    }

    public function edituserprofile(Request $request)
    {

        $user = User::whereId(Auth::user()->id)->select('id')->first();

        if ($request->input('email') === Auth::user()->email && $request->input('phone') === Auth::user()->phone) {
            $request->validate([
                'name' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email'],
                'phone' => ['required', 'numeric', 'min:10'],
                'image' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:50000', 'dimensions:width=200,height=200'],

            ]);
            $user->name = $request->input('name');
            $user->gender = $request->input('gender');
            $user->father_name = $request->input('father_name');
            $user->birthday = $request->input('birthday');
            $user->marital_status = $request->input('marital_status');
            $user->national_id = $request->input('national_id');
            $user->national_id = $request->input('national_id');
            $user->user_job = $request->input('user_job');
            $user->nationality = $request->input('nationality');
            $user->personality_type = $request->input('personality_type');
            $user->job_title = $request->input('job_title');
            $user->birth_certificate = $request->input('birth_certificate');
            $user->education_id = $request->input('education_id');
            $user->place_id = $request->input('place_id');
            $user->folder_id = $request->input('folder_id');
            $user->folder_base = $request->input('folder_base');
            $user->folder_validity = $request->input('folder_validity');
            $user->telphone = $request->input('telphone');
            $user->state_id = $request->input('state_id');
            $user->city_id = $request->input('city_id');
            $user->address = $request->input('address');
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $imagePath = public_path("users");
                $imagelink = "users";
                $filename = Str::random(30) . "." . $file->clientExtension();
                $newImage = Image::make($file);
                $newImage->fit(480, 320);
                $user->image = $imagelink . '/' . $filename;
                $newImage->save($imagePath . '/' . $filename);
            }
            $user->save();
        } elseif ($request->input('email') === Auth::user()->email && $request->input('phone') != Auth::user()->phone) {
            $request->validate([
                'name' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email'],
                'phone' => ['required', 'numeric', 'min:10', 'unique:users,phone'],
                'image' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:50000', 'dimensions:width=200,height=200'],

            ]);
            $user->name = $request->input('name');
            $user->gender = $request->input('gender');
            $user->father_name = $request->input('father_name');
            $user->birthday = $request->input('birthday');
            $user->national_id = $request->input('national_id');
            $user->job_title = $request->input('job_title');
            $user->birth_certificate = $request->input('birth_certificate');
            $user->education_id = $request->input('education_id');
            $user->place_id = $request->input('place_id');
            $user->folder_id = $request->input('folder_id');
            $user->folder_base = $request->input('folder_base');
            $user->folder_validity = $request->input('folder_validity');
            $user->telphone = $request->input('telphone');
            $user->state_id = $request->input('state_id');
            $user->city_id = $request->input('city_id');
            $user->address = $request->input('address');
            $user->phone = $request->input('phone');
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $imagePath = public_path("users");
                $imagelink = "users";
                $filename = Str::random(30) . "." . $file->clientExtension();
                $newImage = Image::make($file);
                $newImage->fit(480, 320);
                $user->image = $imagelink . '/' . $filename;
                $newImage->save($imagePath . '/' . $filename);
            }
            $user->save();

        } elseif ($request->input('phone') === Auth::user()->phone && $request->input('email') != Auth::user()->email) {
            $request->validate([
                'name' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email', 'unique:users,email'],
                'phone' => ['required', 'numeric', 'min:10'],
                'image' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:50000', 'dimensions:width=200,height=200'],

            ]);
            $user->name = $request->input('name');
            $user->gender = $request->input('gender');
            $user->father_name = $request->input('father_name');
            $user->birthday = $request->input('birthday');
            $user->national_id = $request->input('national_id');
            $user->job_title = $request->input('job_title');
            $user->birth_certificate = $request->input('birth_certificate');
            $user->education_id = $request->input('education_id');
            $user->place_id = $request->input('place_id');
            $user->folder_id = $request->input('folder_id');
            $user->folder_base = $request->input('folder_base');
            $user->folder_validity = $request->input('folder_validity');
            $user->telphone = $request->input('telphone');
            $user->state_id = $request->input('state_id');
            $user->city_id = $request->input('city_id');
            $user->address = $request->input('address');
            $user->email = $request->input('email');
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $imagePath = public_path("users");
                $imagelink = "users";
                $filename = Str::random(30) . "." . $file->clientExtension();
                $newImage = Image::make($file);
                $newImage->fit(480, 320);
                $user->image = $imagelink . '/' . $filename;
                $newImage->save($imagePath . '/' . $filename);
            }
            $user->save();
        } elseif ($request->input('phone') != Auth::user()->phone && $request->input('email') != Auth::user()->email) {
            $request->validate([
                'name' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email', 'unique:users,email'],
                'phone' => ['required', 'numeric', 'min:10', 'unique:users,phone'],
                'image' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:50000', 'dimensions:width=200,height=200'],

            ]);
            $user->name = $request->input('name');
            $user->gender = $request->input('gender');
            $user->father_name = $request->input('father_name');
            $user->birthday = $request->input('birthday');
            $user->national_id = $request->input('national_id');
            $user->job_title = $request->input('job_title');
            $user->birth_certificate = $request->input('birth_certificate');
            $user->education_id = $request->input('education_id');
            $user->place_id = $request->input('place_id');
            $user->folder_id = $request->input('folder_id');
            $user->folder_base = $request->input('folder_base');
            $user->folder_validity = $request->input('folder_validity');
            $user->telphone = $request->input('telphone');
            $user->state_id = $request->input('state_id');
            $user->city_id = $request->input('city_id');
            $user->address = $request->input('address');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $imagePath = public_path("users");
                $imagelink = "users";
                $filename = Str::random(30) . "." . $file->clientExtension();
                $newImage = Image::make($file);
                $newImage->fit(480, 320);
                $user->image = $imagelink . '/' . $filename;
                $newImage->save($imagePath . '/' . $filename);
            }
            $user->save();
        }
        return Redirect::back();
    }

    public function editusermobile(Request $request)
    {
        $user = User::whereId(Auth::user()->id)->select('id')->first();
        $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'numeric', 'min:10'],
            'image' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:50000'],
        ]);
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->national_id = $request->input('national_id');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $imagePath = public_path("users");
            $imagelink = "users";
            $filename = Str::random(30) . "." . $file->clientExtension();
            $newImage = Image::make($file);
            $newImage->fit(480, 320);
            $user->image = $imagelink . '/' . $filename;
            $newImage->save($imagePath . '/' . $filename);
        }
        $user->save();

        $request->session()->flash('auth', [
            'user_id' => $user->id,
            'reg' => 1
        ]);

        $code = ActiveCode::generateCode($user);

        $user->notify(new ActiveCodeNotification($code, $request->input('phone')));
        $phone = $request->input('phone');
        return redirect(route('phone.token'))->with(['phone' => $phone]);
    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if (Hash::check($request->input('old_password'), Auth::user()->password)) {
            $user = User::whereId(Auth::user()->id)->first();
            $user->password = $request->input('password');
            $user->save();
            alert()->success('عملیات موفق', 'رمز عبور با موفقیت تغییر کرد');
        } else {
            alert()->error('عملیات ناموفق', 'رمز عبور فعلی نادرست وارد شده است');
        }
        return Redirect::back();

    }

    public function folders(Request $request)
    {
        $user = Auth::user();
        $notifs = $user->notifs()->whereActive(1)->orderBy('id', 'DESC')->get();
        $companies = Company::first();
        $dashboardmenus = Menu::select('id', 'title', 'slug', 'class', 'priority')->MenuDashboard()->orderBy('priority')->get();

        return view('Site.Dashboard.folders')->with(compact('companies', 'dashboardmenus', 'notifs'));

    }

    public function creatbankpayment(Request $request)
    {

        $request->validate([
            'bank_card' => ['required', 'string'],
            'date' => ['required', 'string'],
            'amount' => ['required', 'numeric'],
            'description' => ['required', 'string', 'min:3'],
        ]);

        $payment = new Payment();

        $payment->card_number = $request->input('bank_card');
        $payment->date = $request->input('date');
        $payment->amount = $request->input('amount');
        $payment->description = $request->input('description');
        $payment->user_id = Auth::user()->id;

        $payment->save();

        return Redirect::back();
    }

    public function changeemail(Request $request)
    {
        $request->validate([
            'old_email' => ['required', 'string', 'min:8'],
            'new_email' => ['required', 'string', 'min:8'],
        ]);
        if (($request->input('old_email') == Auth::user()->email) && ($request->input('old_email') != $request->input('new_email'))) {
            $user = User::whereId(Auth::user()->id)->first();
            $user->email = $request->input('new_email');
            $user->save();
            alert()->success('عملیات موفق', 'ایمیل با موفقیت تغییر کرد');
        } else {
            alert()->error('عملیات ناموفق', 'ایمیل فعلی نادرست وارد شده است');
        }
        return Redirect::back();

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
