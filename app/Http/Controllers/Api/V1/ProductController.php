<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Dashboard\Estelam;
use App\Models\Invoice;
use App\Models\Profile\EstelamToken;
use App\Models\Profile\Workshop;
use App\Models\Profile\Workshopsign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function estelam(Request $request)
    {
        try {
            $token = EstelamToken::select('token', 'appname')->first();
            $headers = [
                'token:' . $token->token,
                'appname:' . $token->appname,
                'Content-Type: application/json',
            ];

            $estelams = Estelam::whereId($request->input('formId'))->get();

            $user = auth()->user();
            $wallet = $user->wallet;
            if ($wallet->balance < '300000') {
                return response()->json(
                    ['isSuccess' => null,
                        'message' => 'موجودی کافی نیست.',
                        'errors' => true,
                        'status_code' => 500,
                        'result' => $wallet->balance
                    ], 500);
            }else{
                foreach ($estelams as $estelam) {

                    $requiredFields = explode(',', $estelam->required_fields);
                    $data = [];

                    foreach ($requiredFields as $field) {
                        $field = trim($field);

                        if ($field <> null) {
                            $data[$field] = $request->input($field);

                        } else {
                            return response()->json(
                                ['isSuccess' => false,
                                    'message' => 'اطلاعات ورودی نادرست می باشد.',
                                    'errors' => true,
                                    'status_code' => 500,
                                ], 500);
                        }
                    }
                    $response = $this->sendCurlRequest($estelam->action_route, $estelam->method, $headers, $data);

                    $result = $response['data']['result'] ?? [];
                    $resultFields = explode(',', $estelam->result_field);

                    foreach ($resultFields as $resultfield) {
                        $dataParts[$resultfield] = $result[$resultfield] ?? '';
                    }
                    if ($response['isSuccess'] === true) {

                        $invoice = new Invoice();
                        $invoice->user_id = Auth::user()->id;
                        $invoice->product_id = $request->input('formId');
                        $invoice->product_type = 'estelam';
                        $invoice->product_price = '300000';
                        $invoice->product_price = '300000';
                        $invoice->save();

                        $data = [
                            'totalFinal' => $invoice->product_price,
                            'invoice_ids' => $invoice->id,
                            'description' => 'دریافت موفق استعلام',
                        ];
                        $withdrawRequest = new Request($data);
                        $walletController = new WalletController();
                        $withdrawResult = $walletController->withdraw($withdrawRequest);

                        if ($withdrawResult->getData()->isSuccess === true) {
                            return response()->json(
                                ['isSuccess' => true,
                                    'message' => 'مقادیر رکورد دریافت شد',
                                    'errors' => null,
                                    'status_code' => 200,
                                    'result' => $dataParts
                                ], 200);
                        }
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
        } catch (\Exception $e) {
            \Log::error('Exception: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    function sendCurlRequest($url, $method, $headers, $data = [])
    {
        try {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            if (strtoupper($method) === 'POST') {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $response = curl_exec($ch);
//dd(json_decode($response, true));
            if (curl_errno($ch)) {
                throw new \Exception(curl_error($ch));
            }
            curl_close($ch);

            return json_decode($response, true);
        } catch (\Exception $e) {
            \Log::error("CURL Request Failed: " . $e->getMessage(), [
                'url' => $url,
                'method' => $method,
                'data' => $data
            ]);
            return null;
        }
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
        return response()->json(
            ['isSuccess' => true,
                'message' => 'مقادیر رکورد دریافت شد',
                'errors' => null,
                'status_code' => 200,
                'result' => $response
            ], 200);
    }

    public function workshopsign(Request $request){

        $workshop = Workshop::whereId($request->input('workshop_id'))->first();

        if ($workshop->status <> 4){
            return response()->json(
                ['isSuccess' => null,
                    'message' => 'کارگاه درحال حاضر قابلیت ثبت نام را ندارد',
                    'errors' => true,
                    'status_code' => 500,
                ], 500);
        }
        try {
            $workshopsigns = DB::table('workshops as w')
                ->join('workshopsigns as ws', 'w.id', '=', 'ws.workshop_id')
                ->select( 'ws.id', 'w.certificate_price as c_price' , 'ws.price' , 'w.type_price')
                ->where('w.id', '=', $request->input('workshop_id'))
                ->where('ws.user_id', '=', Auth::user()->id )
                ->first();

            if ($workshopsigns){
                DB::table('workshopsigns')
                    ->where('workshop_id', $request->input('workshop_id'))
                    ->where('user_id', Auth::id())
                    ->update([
                        'certif_price'   => $workshop->certificate_price,
                        'type_price'     => $workshop->type_price,
                        'workshop_price' => $workshop->price,
                        'price'          => $workshop->price,
                        'user_id'        => Auth::id(),
                    ]);
                return response()->json(
                    ['isSuccess' => true,
                        'message' => 'قبلا اطلاعات ثبت شده بود اما عملیات با موفقیت انجام شده',
                        'errors' => null,
                        'status_code' => 200,
                        'result' => ''
                    ], 200);
            }else {
                $workshopsign = new Workshopsign();
                $workshopsign->workshop_id      = $request->input('workshop_id');
                $workshopsign->certif_price     = $workshop->certificate_price;
                $workshopsign->type_price       = $workshop->type_price;
                $workshopsign->workshop_price   = $workshop->price;
                $workshopsign->user_id          = Auth::user()->id;
                $workshopsign->save();

                $invoice = new Invoice();
                $invoice->user_id           = Auth::user()->id;
                $invoice->product_id        = $request->input('workshop_id');
                $invoice->product_type      = 'workshop';
                $invoice->product_price     = $workshop->price;
                $invoice->type_price        = $workshop->type_price;
                $invoice->type_use          = $request->input('typeuse');
                $invoice->certificate_price = $workshop->certificate_price;
                $invoice->price             = $workshop->certificate_price + $workshop->price;
                $invoice->save();

                if ($workshopsign){
                    return response()->json(
                        ['isSuccess' => true,
                            'message' => 'عملیات با موفقیت انجام شده',
                            'errors' => null,
                            'status_code' => 200,
                            'result' => ''
                        ], 200);
                }else{
                    return response()->json(
                        ['isSuccess' => null,
                            'message' => 'عملیات با خطا مواجه شد، لطفا دوباره تلاش کنید',
                            'errors' => true,
                            'status_code' => 500,
                        ], 500);
                }
            }

        } catch (Exception $e){

            return response()->json(
                ['isSuccess' => null,
                    'message' => 'عملیات با خطا مواجه شد، لطفا دوباره تلاش کنید',
                    'errors' => true,
                    'status_code' => 500,
                ], 500);
        }

    }

    public function workshopinvoice(Request $request){
        $invoice = Invoice::where('user_id' , Auth::user()->id)
            ->where('product_id' , $request->input('workshop_id'))
            ->where('product_type' , 'workshop')
            ->whereNull('price_status')
            ->first();
        $workshopsign = Workshopsign::where('user_id' , Auth::user()->id)
            ->where('workshop_id' , $request->input('workshop_id'))
            ->whereNull('pricestatus')
            ->first();

        $workshop = $invoice->workshop;

        $totalPrice = $workshop->price;
        $certificate_price = 0 ;
        $type_price        = 0 ;
        if ($request->input('certificate') == 1) {
            $totalPrice += $workshop->certificate_price;
            $certificate_price = $workshop->certificate_price;
        }

        if ($request->input('type_use') == 1) {
            $totalPrice += $workshop->type_price;
            $type_price = $workshop->type_price;
        }

        $result = $invoice->update([
            'certificate'       => $request->input('certificate'),
            'certificate_price' => $certificate_price,
            'type_use'          => $request->input('type_use'),
            'type_price'        => $type_price,
            'price'             => $totalPrice,
            'final_price'       => $totalPrice,
        ]);

        $workshopsign->update([
            'certificate'       => $request->input('certificate'),
            'certif_price'      => $certificate_price,
            'typeuse'          => $request->input('type_use'),
            'type_price'        => $type_price,
            'price'             => $totalPrice,
        ]);

        $result = Invoice::where('user_id' , Auth::user()->id)
            ->where('product_id' , $request->input('workshop_id'))
            ->where('product_type' , 'workshop')
            ->whereNull('price_status')
            ->first();

        if ($result) {
            return response()->json(
                ['isSuccess' => true,
                    'message' => 'عملیات با موفقیت انجام شد.',
                    'errors' => null,
                    'status_code' => 200,
                    'result' => $result
                ], 200);
        }else{
            return response()->json(
                ['isSuccess' => null,
                    'message' => 'عملیات با خطا مواجه شد.',
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

    public function purchase_contract(Request $request){
        $contract = Contract::whereId($request->input('contract_id'))->first();
        if ($contract->paid_type == 'nonfree') {
            $user = auth()->user();
            $wallet = $user->wallet;
            if ($wallet->balance < $contract->price) {
                return response()->json(
                    ['isSuccess' => null,
                        'message' => 'موجودی کافی نیست.',
                        'errors' => true,
                        'status_code' => 500,
                        'result' => $wallet->balance
                    ], 500);
            }else{
                $invoice = new Invoice();
                $invoice->user_id           = Auth::user()->id;
                $invoice->product_id        = $request->input('contract_id');
                $invoice->product_type      = 'contract';
                $invoice->product_price     = $contract->price;
                $invoice->price             = $contract->price;
                $invoice->final_price       = $contract->price;
                $invoice->save();
                $data = [
                    'totalFinal'    => $invoice->final_price,
                    'invoice_ids'   => $invoice->id,
                    'description'   => 'خرید نمونه قرارداد',
                ];
                $withdrawRequest    = new Request($data);
                $walletController   = new WalletController();
                $withdrawResult     = $walletController->withdraw($withdrawRequest);

                if ($withdrawResult->getData()->isSuccess === true) {
                    $result = Contract::whereId($request->input('contract_id'))->first();
                    return response()->json(
                        ['isSuccess' => true,
                            'message' => 'پرداخت با موفقیت انجام شد',
                            'errors' => null,
                            'status_code' => 200,
                            'result' => $result
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
        }else{
            $invoice = new Invoice();
            $invoice->user_id           = Auth::user()->id;
            $invoice->product_id        = $request->input('contract_id');
            $invoice->product_type      = 'contract';
            $invoice->product_price     = 0;
            $invoice->price             = 0;
            $invoice->final_price       = 0;
            $invoice->price_status      = 4;
            $invoice->save();

            $result = Contract::whereId($request->input('contract_id'))->first();
            return response()->json(
                ['isSuccess' => true,
                    'message' => 'قرارداد با موفقیت ثبت شد',
                    'errors' => null,
                    'status_code' => 200,
                    'result' => $result
                ], 200);
        }
    }

    public function purchase_workshop(Request $request){
        $invoice = Invoice::whereId($request->input('invoice_id'))->first();
        $workshop = $invoice->workshop;
        $user = auth()->user();
        $wallet = $user->wallet;
            if ($wallet->balance < $invoice->final_price) {
                return response()->json(
                    ['isSuccess' => null,
                        'message' => 'موجودی کافی نیست.',
                        'errors' => true,
                        'status_code' => 500,
                        'result' => $wallet->balance
                    ], 500);
            }else{
                $data = [
                    'totalFinal'    => $invoice->final_price,
                    'invoice_ids'   => $invoice->id,
                    'description'   => $workshop->title,
                ];
                $withdrawRequest    = new Request($data);
                $walletController   = new WalletController();
                $withdrawResult     = $walletController->withdraw($withdrawRequest);

                if ($withdrawResult->getData()->isSuccess === true) {

                    return response()->json(
                        ['isSuccess' => true,
                            'message' => 'ثبت نام و پرداخت با موفقیت انجام شد',
                            'errors' => null,
                            'status_code' => 200,
                            'result' => ''
                        ], 200);
                } else {
                    return response()->json(
                        ['isSuccess' => null,
                            'message' => 'خطا در عملیات',
                            'errors' => true,
                            'status_code' => 500,
                        ], 500);
                }
            }
    }
}
