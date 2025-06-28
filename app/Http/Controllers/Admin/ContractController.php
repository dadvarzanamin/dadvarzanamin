<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ContractController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت نمونه قرارداد',
            'list_title'    => 'لیست نمونه قرارداد',
            'add_title'     => 'افزودن نمونه قرارداد',
            'create_title'  => 'ایجاد نمونه قرارداد',
            'enter_title'   => 'ورود اطلاعات نمونه قرارداد',
        ];
        $contracts      =   Contract::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('contracts')->get();

            return Datatables::of($data)

                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('paid_type', function ($data) {
                    return ($data->paid_type);
                })
                ->addColumn('price', function ($data) {
                    return ($data->price);
                })
                ->addColumn('discount', function ($data) {
                    return ($data->discount);
                })
                ->addColumn('type', function ($data) {
                    return ($data->type);
                })
                ->addColumn('file_path', function ($data) {
                    return ($data->file_path);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    }
                    elseif ($data->status == "4") {
                        return "درحال نمایش";
                    }
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('contract-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';
                    return $actionBtn;
                })
                ->rawColumns(['action' , 'file_link'])
                ->make(true);
        }
        return view('Admin.contracts.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'contracts' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت نمونه قرارداد',
            'list_title'    => 'لیست نمونه قرارداد',
            'add_title'     => 'افزودن نمونه قرارداد',
            'create_title'  => 'ایجاد نمونه قرارداد',
            'enter_title'   => 'ورود اطلاعات نمونه قرارداد',
        ];
        $menus          =   Menu::whereStatus(4)->get();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.contracts.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'menus' , 'thispage']));
    }

    public function store(Request $request)
    {
        //try{
            $contracts = new Contract();
            $contracts->title           = $request->input('title');
            $contracts->price           = str_replace(',', '', $request->input('price'));
            $contracts->discount        = str_replace(',', '', $request->input('discount'));
            $contracts->type            =  $request->input('type');
//            if($request->input('type')) {
//                $contracts->type = json_encode(explode('،', $request->input('type')));
//            }
            $contracts->paid_type       = $request->input('paid_type');
            $contracts->status          = $request->input('status');

            $contracts->text            = $request->input('text');
            $contracts->description     = $request->input('description');

            if ($request->file('file_path')) {
                $file       = $request->file('file_path');
                $imagePath  ="public/contracts";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $contracts->file_path = 'contracts/'.$imageName;
                $file->storeAs($imagePath, $imageName);
            }
            if ($request->file('image')) {
                $file       = $request->file('image');
                $imagePath  ="public/contracts";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $contracts->image = 'contracts/'.$imageName;
                $file->storeAs($imagePath, $imageName);
            }

            $result = $contracts->save();

            if ($result == true) {
                $success = true;
                $flag    = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت ثبت شد';
            }
            else {
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید';
            }

//        } catch (Exception $e) {
//
//            $success = false;
//            $flag    = 'error';
//            $subject = 'خطا در ارتباط با سرور';
//            //$message = strchr($e);
//            $message = 'اطلاعات ثبت نشد،لطفا بعدا مجدد تلاش نمایید ';
//        }
return Redirect::back();
    }

    public function edit($id)
    {
        $thispage       = [
            'title'         => 'مدیریت نمونه قرارداد',
            'list_title'    => 'لیست نمونه قرارداد',
            'add_title'     => 'افزودن نمونه قرارداد',
            'create_title'  => 'ایجاد نمونه قرارداد',
            'enter_title'   => 'ورود اطلاعات نمونه قرارداد',
        ];
        $menus          =   Menu::whereStatus(4)->get();
        $contracts      =   Contract::whereId($id)->first();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.contracts.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'contracts' , 'menus' , 'thispage']));

    }

    public function update(Request $request)
    {
        try{
            $contracts = Contract::whereId($request->input('id'))->first();
            $contracts->title           = $request->input('title');
            $contracts->paid_type       = $request->input('paid_type');
            $contracts->price           = $request->input('price');
            $contracts->discount        = $request->input('discount');
            $contracts->text            = $request->input('text');
            $contracts->description     = $request->input('description');
            if($request->input('type')) {
                $contracts->type = json_encode(explode('،', $request->input('type')));
            }
            $contracts->status      = $request->input('status');

            if ($request->file('file_path')) {
                $file       = $request->file('file_path');
                $imagePath  ="public/contracts";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $contracts->file_path = 'contracts/'.$imageName;
                $file->storeAs($imagePath, $imageName);
            }
            if ($request->file('image')) {
                $file       = $request->file('image');
                $imagePath  ="public/contracts";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $contracts->image = 'contracts/'.$imageName;
                $file->storeAs($imagePath, $imageName);
            }

            $result = $contracts->save();

            if ($result == true) {
                Alert::success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد')->autoclose(3000);
            }
            else {
                Alert::error('عملیات نا موفق', 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید')->autoclose(3000);
            }

        } catch (Exception $e) {
            Alert::error('خطا در ارتباط با سرور', 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید')->autoclose(3000);
        }

        return Redirect::back();
    }

    public function deleteContract(Request $request)
    {
        try {
            $Contract = Contract::findOrfail($request->input('id'));
            $result1 = $Contract->delete();
            if ($result1 == true) {
                $success = true;
                $flag = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت پاک شد';
            }else {
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات منو ثبت نشد، لطفا مجددا تلاش نمایید';
            }

        } catch (Exception $e) {
            $success = false;
            $flag    = 'error';
            $subject = 'خطا در ارتباط با سرور';
            $message = 'اطلاعات پاک نشد،لطفا بعدا مجدد تلاش نمایید ';
        }

        return response()->json(['success'=>$success , 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
    }
}
