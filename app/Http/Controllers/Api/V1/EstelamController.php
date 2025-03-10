<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Estelam;
use App\Models\Profile\EstelamToken;
use App\Models\Profile\Log_estelam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use PHPOpenSourceSaver\JWTAuth\JWTAuth;

class EstelamController extends Controller
{
    public function estelam(Request $request)
    {
        //dd(auth()->guard('api')->user());
        //$user = User::whereApi_token($request->bearerToken())->first();
        $token = EstelamToken::select('token', 'appname')->first();

        $headers = [
            'token:' . $token->token,
            'appname:' . $token->appname,
            'Content-Type: application/json',
        ];
        if ($request->input('formId') == 11) {
            try {
                $estelam = Estelam::whereId(1)->first();
                $url     = $estelam->action_route;

                $postalCode = [
                    "postalCode" => $request->input('postCode')
                ];

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $estelam->method);
                if ($estelam->method == 'POST') {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postalCode));
                }
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $response = curl_exec($ch);

                curl_close($ch);
                $responseData = json_decode($response, true);

                $logs = new Log_estelam();
                $logs->title        = $estelam->title_fa;
                $logs->request      = json_encode($postalCode);
                $logs->response     = json_encode($responseData);
                $logs->action_route = $estelam->action_route;
                $logs->date         = jdate()->format('Y/m/d');
                $logs->user_id      = Auth::user()->id;
                $logs->save();

                $address = $responseData['data']['result']['city']
                    .'-'.$responseData['data']['result']['province']
                    .'-'.$responseData['data']['result']['township']
                    .'-'.$responseData['data']['result']['locality']
                    .'-'.$responseData['data']['result']['avenue']
                    .'-'.$responseData['data']['result']['stopStreet']
                    .'-'.$responseData['data']['result']['no']
                    .'-'.$responseData['data']['result']['floor'];

                $estelam = Estelam::whereId(2)->first();
                $url     = $estelam->action_route;

                $national = [
                    "nationalCode"  => $request->input('nationalID'),
                    "birthDate"     => $request->input('birthDate')
                ];

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $estelam->method);
                if ($estelam->method == 'POST') {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($national));
                }
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $response = curl_exec($ch);

                curl_close($ch);
                $responseData = json_decode($response, true);

//                $logs = new Log_estelam();
//                $logs->title        = $estelam->title_fa;
//                $logs->request      = json_encode($national);
//                $logs->response     = json_encode($responseData);
//                $logs->action_route = $estelam->action_route;
//                $logs->date         = jdate()->format('Y/m/d');
//                $logs->user_id      = Auth::user()->id;
//                $logs->save();

                $firstName  = $responseData['data']['result']['firstName'];
                $lastName   = $responseData['data']['result']['lastName'];
                $fatherName = $responseData['data']['result']['fatherName'];
                $gender     = $responseData['data']['result']['gender'];
                $alive      = $responseData['data']['result']['liveStatus'];

                if ($gender == 1) {
                    $gender = 'مرد';
                } elseif ($gender == 2) {
                    $gender = 'زن';
                }
                if ($alive == 1) {
                    $alive = 'در قید حیات';
                } elseif ($alive == 0) {
                    $alive = 'فوت شده';
                }

                $estelam = Estelam::whereId(7)->first();
                $url = $estelam->action_route;

                $imagedata = [
                    "nationalCode"  => $request->input('nationalID'),
                    "birthDate"     => $request->input('birthDate'),
                ];

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $estelam->method);
                if ($estelam->method == 'POST') {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($imagedata));
                }
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $response = curl_exec($ch);

                curl_close($ch);
                $responseData = json_decode($response, true);

                $logs = new Log_estelam();
                $logs->title        = $estelam->title_fa;
                $logs->request      = json_encode($imagedata);
                $logs->response     = json_encode($responseData);
                $logs->action_route = $estelam->action_route;
                $logs->date         = jdate()->format('Y/m/d');
                $logs->user_id      = Auth::user()->id;
                $logs->save();

                $image = $responseData['data']['result']['image'];

                $image = '<img src="data:image/jpeg;base64,' . $image . '">';

                $result = [
                    'کد ملی'        => $request->input('nationalID'),
                    'نام'           => $firstName,
                    'نام خانوادگی'  => $lastName,
                    'نام پدر'       => $fatherName,
                    'تاریخ تولد'    => $request->input('birthDate'),
                    'جنسیت'         => $gender,
                    'وضعیت حیات'    => $alive,
                    'تصویر'         => $image,
                    'آدرس'          => $address,
                ];
                return response()->json(['response' => $result]);
            } catch (Exception $e) {

                $message = 'خطای سیستم،لطفا بعدا مجدد تلاش نمایید ';
                return response()->json(['error' => $message], 500);
            }

        }
        $estelam = Estelam::whereId($request->input('formId'))->first();

        try {
            if ($estelam->method == 'GET') {
                $url = $estelam->action_route . '?companyNationalCode=' . $request->input('companyNationalCode');

            } elseif ($estelam->method == 'POST') {
                $url = $estelam->action_route;
            }
        if ($request->input('formId') == 1) {

            $data = [
                "postalCode" => $request->input('postalCode')
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

//            $logs = new Log_estelam();
//            $logs->title = $estelam->title_fa;
//            $logs->request = json_encode($data);
//            $logs->response = json_encode($responseData);
//            $logs->action_route = $estelam->action_route;
//            $logs->date = jdate()->format('Y/m/d');
//            $logs->user_id = Auth::user()->id;
//            $logs->save();

            $address = $responseData['data']['result']['city']
                .'-'.$responseData['data']['result']['province']
                .'-'.$responseData['data']['result']['township']
                .'-'.$responseData['data']['result']['locality']
                .'-'.$responseData['data']['result']['avenue']
                .'-'.$responseData['data']['result']['stopStreet']
                .'-'.$responseData['data']['result']['no']
                .'-'.$responseData['data']['result']['floor'];

            $status     = $responseData['isSuccess'];
            $message    = $responseData['message'];

            $result = [
                'آدرس' => $address
            ];

            return response()->json(['response' => $result]);


        } elseif ($request->input('formId') == 2) {

            $data = [
                "nationalCode"  => $request->input('nationalID'),
                "birthDate"     => $request->input('birthDate')
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

//            $logs = new Log_estelam();
//            $logs->title = $estelam->title_fa;
//            $logs->request = json_encode($data);
//            $logs->response = json_encode($responseData);
//            $logs->action_route = $estelam->action_route;
//            $logs->date = jdate()->format('Y/m/d');
//            $logs->user_id = Auth::user()->id;
//            $logs->save();


            $firstName  = $responseData['data']['result']['firstName'];
            $lastName   = $responseData['data']['result']['lastName'];
            $fatherName = $responseData['data']['result']['fatherName'];
            $gender     = $responseData['data']['result']['gender'];
            $alive      = $responseData['data']['result']['liveStatus'];

            if ($gender == 1) {
                $gender = 'مرد';
            } elseif ($gender == 2) {
                $gender = 'زن';
            }
            if ($alive == 1) {
                $alive = 'در قید حیات';
            } elseif ($alive == 0) {
                $alive = 'فوت شده';
            }

            $result = [
                'کد ملی'        => $request->input('nationalID'),
                'نام'           => $firstName,
                'نام خانوادگی'  => $lastName,
                'نام پدر'       => $fatherName,
                'تاریخ تولد'    => $request->input('birthDate'),
                'جنسیت'         => $gender,
                'وضعیت حیات'    => $alive,
            ];

            return response()->json(['response' => $result]);

            //dd($nationalCode , $firstName , $lastName , $fatherName , $birthDate , $alive , $gender);
        } elseif ($request->input('formId') == 3) {

            $data = [
                "number"  => $request->input('cardNumber'),
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

//            $logs = new Log_estelam();
//            $logs->title = $estelam->title_fa;
//            $logs->request = json_encode($data);
//            $logs->response = json_encode($responseData);
//            $logs->action_route = $estelam->action_route;
//            $logs->date = jdate()->format('Y/m/d');
//            $logs->user_id = Auth::user()->id;
//            $logs->save();

            $ownerName     = $responseData['data']['result']['firstName'].' '.$responseData['data']['result']['lastName'];
            $depositNumber = $responseData['data']['result']['depositNumber'];
            $iban          = $responseData['data']['result']['iban'];
            $bank          = $responseData['data']['result']['bankName'];
            $status        = $responseData['data']['result']['status'];

            if ($status == 'ACTIVE') {
                $status = 'فعال';
            } else {
                $status = 'غیر فعال';
            }

            $result = [
                'نام مالک کارت' => $ownerName,
                'شماره حساب'    => $depositNumber,
                'شماره شبا'     => $iban,
                'نام بانک'      => $bank,
                'وضعیت کارت'    => $status,
            ];

            return response()->json(['response' => $result]);

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

            return response()->json(['response' => $result]);

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

            return response()->json(['response' => $result]);

        } elseif ($request->input('formId') == 6) {

            $ibanCheckResult = $responseData['description']['ibanIdentityInquiry']['respObject']['ibanCheckResult'];

            $result = [
                ' وضعیت حساب ' => $ibanCheckResult,
            ];

            return response()->json(['response' => $result]);

        } elseif ($request->input('formId') == 7) {

            $data = [
                "nationalCode"  => $request->input('nationalID'),
                "birthDate"     => $request->input('birthDate'),
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

            $image = $responseData['data']['result']['image'];

            $image = '<img src="data:image/jpeg;base64,' . $image . '">';
            $result = [
                '  تصویر ' => $image,
            ];

            return response()->json(['response' => $result]);

        } elseif ($request->input('formId') == 8) {

            $message = $responseData['description']['details']['message'];
            $result = [
                '  مانده حساب ' => $message,
            ];

            return response()->json(['response' => $result]);

        } elseif ($request->input('formId') == 9) {

            $message = $responseData['description']['details']['message'];
            $result = [
                '  مانده حساب ' => $message,
            ];

            return response()->json(['response' => $result]);

        }elseif ($request->input('formId') == 10) {
            $data = [
                "nationalCode"  => $request->input('nationalCode'),
                "customerType"  => $request->input('customerType'),
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
            if ($responseData['isSuccess'] == true) {

                $count = $responseData['data']['result']['count'];
                $result = [
                    'isSuccess'   => $responseData['isSuccess'],
                    'count'    => $count
                ];
            }elseif($responseData['isSuccess'] == false){

                $result = [
                    'isSuccess'   => $responseData['isSuccess'],
                ];
            }

            return response()->json(['response' => $result]);

        }elseif ($request->input('formId') == 12) {

            $data = [
                "Data" => [
                    "id" => $request->input('companyId'),
                ]
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

            if ($responseData['isSuccess'] == true) {
                $activityEndDate = $responseData['data']['result']['activityEndDate'];
                $addressDesc     = $responseData['data']['result']['addressDesc'];
                $createDateTime  = $responseData['data']['result']['createDateTime'];
                $emaiLAddress    = $responseData['data']['result']['emaiLAddress'];
                $faxNumber       = $responseData['data']['result']['faxNumber'];
                $issuanceDate    = $responseData['data']['result']['issuanceDate'];
                $name            = $responseData['data']['result']['name'];
                $nationalId      = $responseData['data']['result']['nationalId'];
                $postCode        = $responseData['data']['result']['postCode'];
                $registerDate    = $responseData['data']['result']['registerDate'];
                $registerNumber  = $responseData['data']['result']['registerNumber'];
                $companyType     = $responseData['data']['result']['companyType'];
                $result = [
                    'isSuccess'   => $responseData['isSuccess'],
                    'activityEndDate'    => $activityEndDate,
                    'addressDesc'    => $addressDesc    ,
                    'createDateTime'    => $createDateTime ,
                    'emaiLAddress'    => $emaiLAddress   ,
                    'faxNumber'    => $faxNumber      ,
                    'issuanceDate'    => $issuanceDate   ,
                    'name'    => $name           ,
                    'nationalId'    => $nationalId     ,
                    'postCode'    => $postCode       ,
                    'registerDate'    => $registerDate   ,
                    'registerNumber'    => $registerNumber ,
                    'companyType'    => $companyType    ,
                ];
            }elseif($responseData['isSuccess'] == false){

                $result = [
                    'isSuccess'   => $responseData['isSuccess'],
                ];
            }

            return response()->json(['response' => $result]);

        }elseif ($request->input('formId') == 13) {
            $data = [
                "iban"  => $request->input('iban'),
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

            if ($responseData['isSuccess'] == true) {

                $name           = $responseData['data']['result']['firstName'] . ' '. $responseData['data']['result']['lastName'];
                $accountNumber  = $responseData['data']['result']['accountNumber'];
                $bankName       = $responseData['data']['result']['bankName'];

                $result = [
                    'isSuccess'          => $responseData['isSuccess'],
                    'name'            => $name,
                    'accountNumber'   => $accountNumber,
                    'bankName'        => $bankName
                ];
            }elseif($responseData['isSuccess'] == false){
                $result = [
                    ' isSuccess '   => $responseData['isSuccess'],
                ];
            }
            return response()->json(['response' => $result]);
        }elseif ($request->input('formId') == 14) {
            $data = [
                "cardNumber"  => $request->input('cardNumber'),
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

            if ($responseData['isSuccess'] == false) {

                $name           = $responseData['details']['respObject']['ownerName'];
                $accountNumber  = $responseData['details']['respObject']['accountNumber'];
                $bankname       = $responseData['details']['respObject']['bank'];
                $iban           = $responseData['details']['respObject']['iban'];

                $result = [
                    'isSuccess'     => $responseData['isSuccess'],
                    'name'          => $name,
                    'accountNumber' => $accountNumber,
                    'bankName'      => $bankname,
                    'iban'          => $iban
                ];
            }elseif($responseData['isSuccess'] == true){
                $result = [
                    ' isSuccess '   => $responseData['isSuccess'],
                ];
            }
            return response()->json(['response' => $result]);
        }elseif ($request->input('formId') == 15) {
            $data = [
                "nationalCode"  => $request->input('nationalCode'),
                "mobileNumber"  => $request->input('mobileNumber'),
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

            if ($responseData['isSuccess'] == false) {
                $result = [
                    ' isSuccess '   => $responseData['isSuccess'],
                ];
            }elseif($responseData['isSuccess'] == true){

                $list           = $responseData['data']['result']['plateList'];

                $result = [
                    'isSuccess'     => $responseData['isSuccess'],
                    'list'          => $list,
                ];


            }
            return response()->json(['response' => $result]);
        }elseif ($request->input('formId') == 16) {
            $data = [
                "CompanyId"  => $request->input('CompanyId'),
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

            if ($responseData['isSuccess'] == false) {
                $result = [
                    ' isSuccess '   => $responseData['isSuccess'],
                ];
            }elseif($responseData['isSuccess'] == true){

                $companyTitle   = $responseData['data']['result']['companyTitle'];
//                $position       = $responseData['data']['result']['boardMembers'][0]['Person']['Tagline'];
//                $positions = [];
//                foreach ($responseData['data']['result']['boardMembers'] as $member) {
//                    $positions[] = $member['Person']['Tagline'];
//                }
//                $name = [];
//                foreach ($responseData['data']['result']['boardMembers'] as $member) {
//                    $name[] = $member['Person']['Title'];
//                }
                //$name           = $responseData['data']['result']['boardMembers'][0]['Person']['Title'];
                $details = [];
                foreach ($responseData['data']['result']['boardMembers'] as $member) {
                    $position = $member['Person']['Tagline'];
                    $name = $member['Person']['Title'];
                    $details[] = $name . ' - ' . $position;
                }


                $result = [
                    'isSuccess'     => $responseData['isSuccess'],
                    'companyTitle'  => $companyTitle,
                    'details'      => $details,
                    //'name'          => $name,
                ];
            }
            return response()->json(['response' => $result]);
        }

        } catch (Exception $e) {
            $message = 'اطلاعات پاک نشد،لطفا بعدا مجدد تلاش نمایید ';
            return response()->json(['error' => $message], 500);
        }
    }
}
