<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\APP\contractDrafting;
use App\Models\APP\documentDrafting;
use App\Models\APP\judgement;
use App\Models\APP\lawsuit;
use App\Models\APP\legalAdvice;
use App\Models\APP\tokil;
use App\Models\APP\Version;
use App\Models\Emploee;
use App\Models\Profile\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

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
            $arrayData = $request->input(['fields']);
            $filePaths = [];
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('upload/files', 'public');
                    $filePaths[] = $path;
                }
            }
            tokil::create([
                'case_type'         => $arrayData['case_type'],
                'hearing_date'      => $arrayData['hearing_date'],
                'hearing_time'      => $arrayData['hearing_time'],
                'province'          => $arrayData['province'],
                'city'              => $arrayData['city'],
                'court_complex'     => $arrayData['court_complex'],
                'court_branch'      => $arrayData['court_branch'],
                'additional_info'   => $arrayData['additional_info'],
                'user_id'           => Auth::user()->id,
                'uploaded_file'     => json_encode($filePaths),
            ]);
        }elseif($request->input(['type']) == 'lawsuit'){
            $arrayData = $request->input(['fields']);
            $filePaths = [];
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('upload/files', 'public');
                    $filePaths[] = $path;
                }
            }
            lawsuit::create([
                'case_type'             => $arrayData['case_type'],
                'case_subject'          => $arrayData['case_subject'],
                'stage'                 => $arrayData['stage'],
                'opponent_name'         => $arrayData['opponent_name'],
                'opponent_national_id'  => $arrayData['opponent_national_id'],
                'additional_info'       => $arrayData['additional_info'],
                'user_id'           => Auth::user()->id,
                'uploaded_file'     =>$request->input(['files']),
            ]);
        }elseif($request->input(['type']) == 'legalAdvice'){
            $arrayData = $request->input(['fields']);

            legalAdvice::create([
                'topic'             => $arrayData['topic'],
                'sub_topic'         => $arrayData['sub_topic'],
                'type'              => $arrayData['type'],
                'additional_info'   => $arrayData['additional_info'],
                'user_id'           => Auth::user()->id,
            ]);
        }elseif($request->input(['type']) == 'contractDrafting'){
            $arrayData = $request->input(['fields']);
            $filePaths = [];
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('upload/files', 'public');
                    $filePaths[] = $path;
                }
            }
             contractDrafting::create([
                'contract_type'             => $arrayData['contract_type'],
                'party_one_name'            => $arrayData['party_one_name'],
                'party_two_name'            => $arrayData['party_two_name'],
                'party_one_national_id'     => $arrayData['party_one_national_id'],
                'party_two_national_id'     => $arrayData['party_two_national_id'],
                'user_id'           => Auth::user()->id,
                 'uploaded_file'     => json_encode($filePaths),
            ]);
        }elseif($request->input(['type']) == 'documentDrafting'){
            $arrayData = $request->input(['fields']);
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('upload/files', 'public');
                    $filePaths[] = $path;
                }
            }
             documentDrafting::create([
                'topic'             => $arrayData['topic'],
                'sub_topic'         => $arrayData['sub_topic'],
                'document_type'     => $arrayData['document_type'],
                'additional_info'   => $arrayData['additional_info'],
                'user_id'           => Auth::user()->id,
                 'uploaded_file'     => json_encode($filePaths),
            ]);
        }elseif($request->input(['type']) == 'judgement'){
            $arrayData = $request->input(['fields']);
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('upload/files', 'public');
                    $filePaths[] = $path;
                }
            }
             judgement::create([
                'judgement_type'            => $arrayData['judgement_type'],
                'contract_type'             => $arrayData['contract_type'],
                'party_one_name'            => $arrayData['party_one_name'],
                'party_two_name'            => $arrayData['party_two_name'],
                'party_one_national_id'     => $arrayData['party_one_national_id'],
                'party_two_national_id'     => $arrayData['party_two_national_id'],
                'user_id'           => Auth::user()->id,
                 'uploaded_file'     => json_encode($filePaths),
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'فرم با موفقیت ثبت شد',
        ], 201);

        // return Response::json(['ok' => true , 'message' => 'success' , 'response' => $response]);
    }
}
