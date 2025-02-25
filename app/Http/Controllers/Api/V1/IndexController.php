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
use App\Models\Emploee;
use App\Models\Profile\Workshop;
use App\Models\Profile\Workshopsign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
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
    public function workshops(){
        $workshops = Workshop::select('id', 'title', 'teacher', 'teacher_image', 'teacher_resume', 'price', 'certificate_price', 'offer', 'duration', 'type', 'image', 'video', 'date', 'description', 'target', 'level' , 'status')->get();

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
            'percentage'  => $percentage,
            'discount'    => $discount  ,
        ];

        return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);

    }
}
