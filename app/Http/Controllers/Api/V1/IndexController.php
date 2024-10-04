<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Emploee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class IndexController extends Controller
{
    public function index(){
        $emploees       = Emploee::select('id' , 'priority' , 'fullname' , 'image' , 'side' , 'status')->whereStatus(4)->orderBy('priority')->get();
        $response = [
            'emploees'          => $emploees ,
        ];
        return Response::json(['ok' =>true ,'message' => 'success','response'=>$response]);

    }
}
