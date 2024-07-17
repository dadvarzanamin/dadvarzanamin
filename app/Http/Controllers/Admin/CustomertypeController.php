<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CustomertypeRequest;
use App\Models\Dashboard\Customertype;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class CustomertypeController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت نوع مشتریان',
            'list_title'    => 'لیست نوع مشتریان',
            'add_title'     => 'افزودن نوع مشتریان',
            'create_title'  => 'ایجاد نوع مشتریان',
            'edit_title'    => 'ویرایش نوع مشتریان',
            'enter_title'   => 'ورود اطلاعات نوع مشتریان',
        ];
        $customertypes  =   Customertype::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('customertypes')
                //->join('menus' , 'slides.menu_id' , '=' , 'menus.id')
                //->select('menus.title as menu' , 'slides.id', 'slides.title1', 'slides.title2', 'slides.title3', 'slides.status', 'slides.file_link')
                ->get();

            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('name', function ($data) {
                    return ($data->name);
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('customer-type-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })

                ->rawColumns(['action' , 'file_link'])
                ->make(true);
        }

        return view('Admin.customertypes.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'customertypes' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت نوع مشتریان',
            'list_title'    => 'لیست نوع مشتریان',
            'add_title'     => 'افزودن نوع مشتریان',
            'create_title'  => 'ایجاد نوع مشتریان',
            'edit_title'    => 'ویرایش نوع مشتریان',
            'enter_title'   => 'ورود اطلاعات نوع مشتریان',
        ];
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.customertypes.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'thispage']));
    }

    public function store(Request $request)
    {
        try{
            $customertypes = new Customertype();
            $customertypes->name        = $request->input('name');
            $customertypes->user_id     = Auth::user()->id;

            $result = $customertypes->save();

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

        } catch (Exception $e) {

            $success = false;
            $flag    = 'error';
            $subject = 'خطا در ارتباط با سرور';
            //$message = strchr($e);
            $message = 'اطلاعات ثبت نشد،لطفا بعدا مجدد تلاش نمایید ';
        }

        return response()->json(['success'=>$success , 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
    }

    public function edit($id)
    {
        $thispage       = [
            'title'         => 'مدیریت نوع مشتریان',
            'list_title'    => 'لیست نوع مشتریان',
            'add_title'     => 'افزودن نوع مشتریان',
            'create_title'  => 'ایجاد نوع مشتریان',
            'edit_title'    => 'ویرایش نوع مشتریان',
            'enter_title'   => 'ورود اطلاعات نوع مشتریان',
        ];
        $customertypes  =   Customertype::whereId($id)->first();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.customertypes.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'customertypes' , 'thispage']));

    }

    public function update(CustomertypeRequest $request)
    {
        try {
                $customer = Customertype::findOrfail($request->input('customer_id'));
                $customer->name                 = $request->input('name');

                $result = $customer->save();

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

    public function deletecustomertypes(Request $request)
    {
        try {

            $customertype = Customertype::findOrfail($request->input('id'));
            $result1 = $customertype->delete();
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
