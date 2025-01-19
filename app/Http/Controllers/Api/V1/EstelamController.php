<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Estelam;
use App\Models\Profile\EstelamToken;
use App\Models\Profile\Log_estelam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstelamController extends Controller
{
    public function estelam(Request $request)
    {
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

//            $logs = new Log_estelam();
//            $logs->title = $estelam->title_fa;
//            $logs->request = json_encode($data);
//            $logs->response = json_encode($responseData);
//            $logs->action_route = $estelam->action_route;
//            $logs->date = jdate()->format('Y/m/d');
//            $logs->user_id = Auth::user()->id;
//            $logs->save();

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
dd($responseData);
            $image = $responseData['data']['result']['image'];

            $image = '<img src="data:image/jpeg;base64,' . $image . '">';
            $result = [
                '  تصویر ' => $image,
            ];

            return response()->json(['response' => $result]);

        }

        } catch (Exception $e) {
            $message = 'اطلاعات پاک نشد،لطفا بعدا مجدد تلاش نمایید ';
            return response()->json(['error' => $message], 500);
        }
    }
}
