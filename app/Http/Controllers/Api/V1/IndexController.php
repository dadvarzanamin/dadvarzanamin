<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\APP\contractDrafting;
use App\Models\APP\Courts;
use App\Models\APP\documentDrafting;
use App\Models\APP\judgement;
use App\Models\APP\lawsuit;
use App\Models\APP\legalAdvice;
use App\Models\APP\tokil;
use App\Models\APP\Version;
use App\Models\Article;
use App\Models\Contract;
use App\Models\Emploee;
use App\Models\Invoice;
use App\Models\Profile\City;
use App\Models\Profile\State;
use App\Models\Profile\Workshop;
use App\Models\Profile\Workshopsign;
use Evryn\LaravelToman\CallbackRequest;
use Evryn\LaravelToman\Facades\Toman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function version(){
        $version = Version::latest('id')->first();

        $response = [
            'version'          => $version ,
        ];
        return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);
    }

    public function index(){
        $emploees       = Emploee::select('id' , 'priority' , 'fullname' , 'image' , 'side' , 'status')->whereStatus(4)->orderBy('priority')->get();
        $response = [
            'emploees'          => $emploees ,
        ];
        return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);

    }

    public function workshops(Request $request){
        $workshops = Workshop::select('id', 'title', 'teacher', 'teacher_image', 'teacher_resume', 'price', 'certificate_price', 'offer', 'duration', 'type', 'image', 'video', 'date', 'description', 'target', 'level' , 'status')->where('id' , '!=' , 2)->get();

        $response = [
            'workshops' => $workshops->map(function ($workshop) {
                return [
                    'id'                => $workshop->id,
                    'title'             => $workshop->title,
                    'teacher'           => $workshop->teacher,
                    'teacher_image'     => $workshop->teacher_image,
                    'teacher_resume'    => $workshop->teacher_resume,
                    'price'             => $workshop->price,
                    'certificate_price' => $workshop->certificate_price,
                    'offer'             => $workshop->offer,
                    'duration'          => $workshop->duration,
                    'type'              => json_decode($workshop->type),
                    'image'             => $workshop->image,
                    'video'             => $workshop->video,
                    'date'              => $workshop->date,
                    'description'       => $workshop->description,
//                    'target'            => strip_tags($workshop->target),
                    'target'            => $workshop->target,
                    'status'            => $workshop->status,
                    'level'             => $workshop->level,
                ];
            }),
        ];

        return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);
    }

    public function form(Request $request){

        if($request->input(['type']) == 'tokil'){
            $arrayData = $request->input('fields');
            $arrayData = json_decode($arrayData, true) ?? [];
            $tokil = new tokil();
            $tokil->case_type        = $arrayData['case_type'];
            $tokil->hearing_date    = $arrayData['hearing_date'];
            $tokil->hearing_time     = $arrayData['hearing_time'];
            $tokil->province         = $arrayData['province'];
            $tokil->city             = $arrayData['city'];
            $tokil->court_complex    = $arrayData['court_complex'];
            $tokil->court_branch     = $arrayData['court_branch'];
            $tokil->additional_info  = $arrayData['additional_info'];
            $tokil->user_id            = Auth::user()->id;

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('upload/tokil/files', 'public');
                    $filePaths[] = $path;
                }
            }
            $tokil->uploaded_file            = json_encode($filePaths);

            $tokil->save();
        }
        elseif($request->input(['type']) == 'lawsuit'){
            $arrayData = $request->input('fields');
            $arrayData = json_decode($arrayData, true) ?? [];
            $lawsuit = new Lawsuit();
            $lawsuit->case_type          = $arrayData['case_type'];
            $lawsuit->case_subject       = $arrayData['case_subject'];
            $lawsuit->stage              = $arrayData['stage'];
            $lawsuit->opponent_name      = $arrayData['opponent_name'];
            $lawsuit->opponent_national_id = $arrayData['opponent_national_id'];
            $lawsuit->additional_info    = $arrayData['additional_info'];
            $lawsuit->user_id            = Auth::user()->id;

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('upload/lawsuit/files', 'public');
                    $filePaths[] = $path;
                }
            }
            $lawsuit->uploaded_file            = json_encode($filePaths);

            $lawsuit->save();

        }elseif($request->input(['type']) == 'legalAdvice'){
            $arrayData = $request->input('fields');
            $arrayData = json_decode($arrayData, true) ?? [];
            $legalAdvice = new legalAdvice();
            $legalAdvice->topic        = $arrayData['topic'];
            $legalAdvice->sub_topic     = $arrayData['sub_topic'];
            $legalAdvice->type     = $arrayData['type'];
            $legalAdvice->additional_info         = $arrayData['additional_info'];
            $legalAdvice->user_id            = Auth::user()->id;

           // if ($request->hasFile('files')) {
           //     foreach ($request->file('files') as $file) {
           //         $path = $file->store('upload/legalAdvice/files', 'public');
           //         $filePaths[] = $path;
           //     }
           // }
           // $legalAdvice->uploaded_file            = json_encode($filePaths);
            $legalAdvice->save();

        }elseif($request->input(['type']) == 'contractDrafting'){
            $arrayData = $request->input('fields');
            $arrayData = json_decode($arrayData, true) ?? [];
            $contractDrafting = new contractDrafting();
            $contractDrafting->contract_type             = $arrayData['contract_type'];
            $contractDrafting->party_one_name            = $arrayData['party_one_name'];
            $contractDrafting->party_two_name            = $arrayData['party_two_name'];
            $contractDrafting->party_one_national_id     = $arrayData['party_one_national_id'];
            $contractDrafting->party_two_national_id     = $arrayData['party_two_national_id'];
            $contractDrafting->user_id            = Auth::user()->id;

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('upload/contractDrafting/files', 'public');
                    $filePaths[] = $path;
                }
            }
            $contractDrafting->uploaded_file            = json_encode($filePaths);
            $contractDrafting->save();

        }elseif($request->input(['type']) == 'documentDrafting'){
            $arrayData = $request->input('fields');
            $arrayData = json_decode($arrayData, true) ?? [];
            $documentDrafting = new documentDrafting();
            $documentDrafting->topic               = $arrayData['topic'];
            $documentDrafting->sub_topic           = $arrayData['sub_topic'];
            $documentDrafting->document_type       = $arrayData['document_type'];
            $documentDrafting->additional_info     = $arrayData['additional_info'];
            $documentDrafting->user_id             = Auth::user()->id;

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('upload/documentDrafting/files', 'public');
                    $filePaths[] = $path;
                }
            }
            $documentDrafting->uploaded_file            = json_encode($filePaths);
            $documentDrafting->save();

        }elseif($request->input(['type']) == 'judgement'){
            $arrayData = $request->input('fields');
            $arrayData = json_decode($arrayData, true) ?? [];
            $judgement = new judgement();
            $judgement->judgement_type            = $arrayData['judgement_type'];
            $judgement->contract_type             = $arrayData['contract_type'];
            $judgement->party_one_name            = $arrayData['party_one_name'];
            $judgement->party_two_name            = $arrayData['party_two_name'];
            $judgement->party_one_national_id     = $arrayData['party_one_national_id'];
            $judgement->party_two_national_id     = $arrayData['party_two_national_id'];
            $judgement->user_id             = Auth::user()->id;

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('upload/judgement/files', 'public');
                    $filePaths[] = $path;
                }
            }
            $judgement->uploaded_file            = json_encode($filePaths);
            $judgement->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'فرم با موفقیت ثبت شد',
        ], 201);

        // return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);
    }

    public function court(){
        $courts       = Courts::whereStatus(4)->get();
        $response = [
            'courts'          => $courts ,
        ];
        return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);
    }

    public function workshopsign(Request $request){

        $workshop = Workshop::whereId($request->input('workshop_id'))->first();
        if ($workshop->status <> 4){
            return Response::json(['ok' =>false ,'message' => 'failed']);
        }
        try {
            $workshopsigns = DB::table('workshops as w')
                ->join('workshopsigns as ws', 'w.id', '=', 'ws.workshop_id')
                ->select( 'ws.id', 'w.certificate_price as c_price' , 'ws.price')
                ->where('w.id', '=', $request->input('workshop_id'))
                ->where('ws.user_id', '=', Auth::user()->id )
                ->first();

            if ($workshopsigns){
                DB::table('workshops as w')
                    ->join('workshopsigns as ws', 'w.id', '=', 'ws.workshop_id')
                    ->select( 'ws.id', 'w.certificate_price as c_price' , 'ws.price')
                    ->where('w.id', '=', $request->input('workshop_id'))
                    ->where('ws.user_id', '=', Auth::user()->id )
                    ->update([
                        'workshop_id'      => $request->input('workshop_id'),
                        'certif_price'     => $workshop->certificate_price,
                        'workshop_price'   => $workshop->price,
                        'user_id'          => Auth::user()->id,
                    ]);
                return Response::json(['ok' =>true ,'message' => 'success']);
            }else {
                $workshopsign = new Workshopsign();
                $workshopsign->workshop_id = $request->input('workshop_id');
                $workshopsign->certif_price = $workshop->certificate_price;
                $workshopsign->workshop_price = $workshop->price;
                $workshopsign->user_id = Auth::user()->id;
                $workshopsign->save();
                if ($workshopsign){
                    return Response::json(['ok' =>true ,'message' => 'success']);
                }else{
                    return Response::json(['ok' =>false ,'message' => 'failed']);
                }
            }

        } catch (Exception $e){

            $response = [
                    'success' => false,
                    'flag'    => 'error',
                    'subject' => 'خطا در ارتباط با سرور',
                    'message' => 'اطلاعات ثبت نشد،لطفا بعدا مجدد تلاش نمایید ',
            ];

            return Response::json(['ok' =>false ,'message' => 'failed','response'=>$response]);
        }

    }

    public function discountcheck(Request $request){

        $workshopsigns = DB::table('workshops')
            ->join('offers', 'workshops.id', '=', 'offers.workshop_id')
            ->join('workshopsigns', 'workshops.id', '=', 'workshopsigns.workshop_id')
            ->select('offers.discount','workshops.price as wprice', 'offers.percentage', 'workshopsigns.id', 'workshopsigns.workshop_price')
            ->where('offers.status', '=', 4)
            ->where('workshopsigns.user_id', '=', Auth::user()->id)
            ->where('offers.offercode', '=', $request->input('discountcode'))
            ->when(
                DB::table('offers')
                    ->where('status', '=', 4)
                    ->where('offercode', '=', $request->input('discountcode'))
                    ->whereNotNull('user_offer')
                    ->exists(),
                function ($query) {
                    $query->where('offers.user_offer', '=', Auth::user()->id);
                }
            )
            ->first();
        $Workshopsignee = Workshopsign::whereId($workshopsigns->id)->first();

        if ($workshopsigns->percentage <> null){
            $Workshopsignee->offer_percentage  = intval(str_replace('%', '', $workshopsigns->percentage));
            $Workshopsignee->price = $workshopsigns->workshop_price - ($workshopsigns->workshop_price * (intval(str_replace('%', '', $workshopsigns->percentage)))/100);
        }elseif ($workshopsigns->discount <> null) {
            $Workshopsignee->offer_discount = (int)$workshopsigns->discount;
            $Workshopsignee->price = $workshopsigns->workshop_price - (int)$workshopsigns->discount;
        }else {
            $Workshopsignee->price = $workshopsigns->wprice;
        }
        $Workshopsignee->update();

        if($workshopsigns == null){
            $discount   = 0;
            $percentage = 0;
        }else{
            $percentage = $workshopsigns->percentage ;
            $discount   = (int)$workshopsigns->discount   ;
        }
        $response = [
            'price'  => $Workshopsignee->price,
        ];

        return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);

    }

    public function pay(Request $request)
    {
        if ($request->input('certificate') == 1){
            $user = Auth::user();
            if ($request->input('birthday') == null || $request->input('national_id') == null ||  $request->input('father_name') == null ) {
                $response = [
                    'error' => 'نام پدر یا تاریخ تولد یا کد ملی خالی می باشد'
                ];
                return Response::json(['ok' =>false ,'message' => 'failed','response'=>$response]);
            }
            if ($request->input('birthday')) {
                $user->birthday = $request->input('birthday');
            }
            if ($request->input('national_id')) {
                $user->national_id = $request->input('national_id');
            }
            if ($request->input('father_name')) {
                $user->father_name = $request->input('father_name');
            }
            $user->update();
        }
         $workshopsigns = DB::table('workshops as w')
                ->join('workshopsigns as ws', 'w.id', '=', 'ws.workshop_id')
                ->select( 'ws.id', 'w.certificate_price as c_price' , 'ws.price' , 'w.price as wprice')
                ->where('w.id', '=', $request->input('workshop_id'))
                ->where('ws.user_id', '=', Auth::user()->id )
                ->where('ws.pricestatus', '=', null )
                ->first();
            $Workshopsigne = Workshopsign::whereId($workshopsigns->id)->first();
            $Workshopsigne->certificate  = $request->input('certificate');
            $Workshopsigne->certif_price = $workshopsigns->c_price;
            $Workshopsigne->typeuse      = $request->input('typeuse');
            if ($workshopsigns->price == 0 && $request->input('certificate') == 1) {
                $Workshopsigne->price = $workshopsigns->c_price + $workshopsigns->wprice;
            }elseif($workshopsigns->price == 0 && $request->input('certificate') == 0){
                $Workshopsigne->price = $workshopsigns->wprice;
            }elseif($workshopsigns->price > 0 && $request->input('certificate') == 1){
                $Workshopsigne->price = $workshopsigns->c_price + $workshopsigns->price;
            }elseif($workshopsigns->price > 0 && $request->input('certificate') == 0){
                $Workshopsigne->price =  $workshopsigns->price;
            }
            $Workshopsigne->update();

        //Session::put('workshopid'.Auth::user()->id, $workshopid);
        //Session::put('finalprice'.Auth::user()->id, $finalprice);

        if (Auth::user()->email == null){
            return Response::json(['ok' =>false ,'message' => 'failed' , 'response' => 'ادرس ایمیل خالی می باشد']);
        }elseif(Auth::user()->phone == null){
            return Response::json(['ok' =>false ,'message' => 'failed' , 'response' => 'شماره موبایل خالی می باشد']);
        }else{
            $workshopsigns = DB::table('workshops as w')
                ->join('workshopsigns as ws', 'w.id', '=', 'ws.workshop_id')
                ->select('w.title' , 'ws.price', 'ws.pricestatus')
                ->where('w.id', '=', $request->input('workshop_id'))
                ->where('ws.user_id', '=', Auth::user()->id )
                ->first();
            if($workshopsigns->pricestatus == null){
                $workshopsigns = DB::table('workshops as w')
                    ->join('workshopsigns as ws', 'w.id', '=', 'ws.workshop_id')
                    ->select('ws.id','w.title' , 'ws.price', 'ws.pricestatus' , 'ws.transactionId')
                    ->where('w.id', '=', $request->input('workshop_id'))
                    ->where('ws.user_id', '=', Auth::user()->id )
                    ->first();

                $request = Toman::amount($workshopsigns->price)
                    ->description($workshopsigns->title)
                    ->callback(url('https://dadvarzanamin.ir/api/v1/backtoapp'))
//                    ->orderId($workshopsigns->transactionId)
                    ->mobile(Auth::user()->phone)
                    ->email(Auth::user()->email)
                    ->request();

            }else{
                $response = [
                    'error'  => 'َشما قبلا در این دوره ثبت نام کرده اید',
                ];
                return Response::json(['ok' =>false ,'message' => 'failed','response'=>$response]);
            }
            if ($request->successful()) {
                    DB::table('workshopsigns as w')->whereId($workshopsigns->id)
                    ->update([
                        'transactionId' => $request->transactionId()
                    ]);
                return response()->json([
                    "ok" => true,
                    "message" => "لینک پرداخت ایجاد شد.",
                    "response" => [
                        "url" => "https://www.zarinpal.com/pg/StartPay/" . $request->transactionId(),
                        "authority" => $request->transactionId(),
                    ],
                ]);
            } else {
                return response()->json([
                    "ok" => false,
                    "message" => "خطا در ایجاد پرداخت.",
                    "errors" => $request->messages(),
                ], 500);
            }
        }
    }

    public function callbackpay(Request $request)
    {
        $authority = $request->query('Authority');
        $status = $request->query('Status');

        if ($status == "OK") {
            $workshopsign = DB::table('workshops as w')
                ->join('workshopsigns as ws', 'w.id', '=', 'ws.workshop_id')
                ->join('users as u', 'ws.user_id', '=', 'u.id')
                ->select( 'u.name as user_name','u.phone', 'ws.id','w.title', 'w.price', 'w.date', 'ws.typeuse', 'ws.price as totalprice')
                ->where('ws.transactionId', '=', $authority)
                //->where('ws.user_id', '=', Auth::user()->id)
                ->where('ws.pricestatus', '=', null)
                ->first();

            $payment = Toman::amount($workshopsign->totalprice)->transactionId($authority)->verify();

            if ($payment->successful()) {
                Workshopsign::whereId($workshopsign->id)->wherePricestatus(null)->update([
                    'referenceId'       => $payment->referenceId(),
                    'pricestatus'       => 4,
                ]);
                if ($workshopsign->typeuse == 1) {
                    $workshoptype = 'حضوری';

                } elseif ($workshopsign->typeuse == 2) {
                    $workshoptype = 'آنلاین';
                }
                try {
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "http://api.ghasedaksms.com/v2/send/verify",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => http_build_query([
                            'type' => '1',
                            'param1' => $workshopsign->user_name,
                            'param2' => $workshopsign->title,
                            'param3' => 1,
                            'receptor' => $workshopsign->phone,
                            'template' => 'workshop',
                        ]),
                        CURLOPT_HTTPHEADER => array(
                            "apikey: ilvYYKKVEXlM+BAmel+hepqt8fliIow1g0Br06rP4ko",
                            "cache-control: no-cache",
                            "content-type: application/x-www-form-urlencoded",
                        ),
                    ));
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);
                } catch (Exception $exception) {
                }
                return view('Api.payment-success');
                //return redirect("yourapp://payment-success?transaction_id=" . $payment->referenceId());
            } else {
                return view('Api.payment-failed');
                //return redirect("yourapp://payment-failed?message=" . urlencode("پرداخت ناموفق بود"));
            }
        } else {
            return view('Api.payment-failed');
            //return redirect("yourapp://payment-failed?message=" . urlencode("پرداخت لغو شد"));
        }
    }

    public function getState(Request $request)
    {
        $states = State::select('id', 'title')->get();
        if ($states) {
            return response()->json(
                ['isSuccess' => true,
                    'message' => 'مقادیر رکورد دریافت شد',
                    'errors' => null,
                    'status_code' => 200,
                    'result' => $states
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

    public function getCity(Request $request)
    {
        $cities = City::select('id', 'title')->whereState_id($request->input('id'))->get();
        if ($cities) {
            return response()->json(
                ['isSuccess' => true,
                    'message' => 'مقادیر رکورد دریافت شد',
                    'errors' => null,
                    'status_code' => 200,
                    'result' => $cities
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

    public function getcontract(Request $request)
    {
        $contracts = Contract::all();
        if ($contracts) {
            return response()->json(
                ['isSuccess' => true,
                    'message' => 'مقادیر رکورد دریافت شد',
                    'errors' => null,
                    'status_code' => 200,
                    'result' => $contracts
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

    public function getarticle(Request $request)
    {
        $articles = Article::all();
        if ($articles) {
            return response()->json(
                ['isSuccess' => true,
                    'message' => 'مقادیر رکورد دریافت شد',
                    'errors' => null,
                    'status_code' => 200,
                    'result' => $articles
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

    public function invoice(Request $request)
    {
        $invoice = new Invoice();
        $invoice->user_id           = Auth::user()->id;
        $invoice->product_id        = $request->input('id');
        $invoice->product_type      = $request->input('type');
        $invoice->product_price     = $request->input('price');
        $invoice->offer_discount    = $request->input('discount');
        $invoice->save();

        $invoices = DB::table('invoices')
            ->leftJoin('workshops', function($join) {
                $join->on('invoices.product_id', '=', 'workshops.id')
                    ->where('invoices.product_type', '=', 'workshops');
            })
            ->leftJoin('contracts', function($join) {
                $join->on('invoices.product_id', '=', 'contracts.id')
                    ->where('invoices.product_type', '=', 'contracts');
            })
            ->where('invoices.user_id', '=', Auth::user()->id)
            ->where('invoices.price_status', '=', null)
            ->select(
                'invoices.*',
                DB::raw("CASE
            WHEN invoices.product_type = 'workshops' THEN workshops.title
            WHEN invoices.product_type = 'contracts' THEN contracts.title
            ELSE null END as product_name")
            )
            ->get();

        return response()->json(
            ['isSuccess' => true,
                'message' => 'مقادیر رکورد دریافت شد',
                'errors' => null,
                'status_code' => 200,
                'result' => $invoices
            ], 200);
    }

    public function showinvoice(Request $request)
    {
        $invoices = DB::table('invoices')
            ->leftJoin('workshops', function($join) {
                $join->on('invoices.product_id', '=', 'workshops.id')
                    ->where('invoices.product_type', '=', 'workshops');
            })
            ->leftJoin('contracts', function($join) {
                $join->on('invoices.product_id', '=', 'contracts.id')
                    ->where('invoices.product_type', '=', 'contracts');
            })
            ->where('invoices.user_id', '=', Auth::user()->id)
            ->where('invoices.price_status', '=', null)
            ->select(
                'invoices.*',
                DB::raw("CASE
            WHEN invoices.product_type = 'workshops' THEN workshops.title
            WHEN invoices.product_type = 'contracts' THEN contracts.title
            ELSE null END as product_name")
            )
            ->get();

        return response()->json(
            ['isSuccess' => true,
                'message' => 'مقادیر رکورد دریافت شد',
                'errors' => null,
                'status_code' => 200,
                'result' => $invoices
            ], 200);
    }

    public function invoicedestroy(Request $request)
    {
        $invoice = Invoice::find($request->id);

        if ($invoice) {
            $invoice->delete();
            return response()->json(
                ['isSuccess' => true,
                    'message' => 'مقادیر رکورد با موفقیت پاک شد',
                    'errors' => null,
                    'status_code' => 200,
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

    public function invoicetotal()
    {
        $totalFinal = Invoice::whereUser_id(Auth::user()->id)
->wherePrice_status(null)
            ->sum(DB::raw('product_price - offer_discount'));

        return response()->json(
            ['isSuccess' => true,
                'message' => 'مقادیر رکورد دریافت شد',
                'errors' => null,
                'status_code' => 200,
                'result' => $totalFinal
            ], 200);
    }

    public function order(Request $request)
    {
        $orders         = DB::table('invoices')
            ->leftJoin('workshops', function ($join) {
                $join->on('invoices.product_id', '=', 'workshops.id')
                    ->where('invoices.product_type', '=', 'workshops');
            })
            ->leftJoin('contracts', function ($join) {
                $join->on('invoices.product_id', '=', 'contracts.id')
                    ->where('invoices.product_type', '=', 'contracts');
            })
            ->where('invoices.user_id', Auth::user()->id)
            ->where('invoices.price_status', 4)
            ->select('invoices.*',
                DB::raw("CASE
                        WHEN invoices.product_type = 'workshops' THEN workshops.title
                        WHEN invoices.product_type = 'contracts' THEN contracts.title
                        ELSE NULL END AS product_name"),
                DB::raw("CASE
                        WHEN invoices.product_type = 'contracts' THEN contracts.file_path
                        ELSE NULL END AS file_path"),
//                DB::raw("CASE
//                        WHEN invoices.product_type = 'contracts' THEN contracts.start_date
//                        ELSE NULL END AS contract_start_date"),
//                DB::raw("CASE
//                        WHEN invoices.product_type = 'contracts' THEN contracts.end_date
//                        ELSE NULL END AS contract_end_date")
            )->get();

        if ($orders) {
            return response()->json(
                ['isSuccess' => true,
                    'message' => 'مقادیر رکورد دریافت شد',
                    'errors' => null,
                    'status_code' => 200,
                    'result' => $orders
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

}

