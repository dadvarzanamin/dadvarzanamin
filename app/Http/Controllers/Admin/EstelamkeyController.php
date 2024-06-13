<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use App\Models\Profile\EstelamToken;
use App\Models\TypeUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class EstelamkeyController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت کلید استعلام',
            'list_title'    => 'لیست کلید استعلام',
            'add_title'     => 'افزودن کلید استعلام',
            'create_title'  => 'ایجاد کلید استعلام',
            'enter_title'   => 'ورود اطلاعات کلید استعلام',
        ];
        $estelams          = EstelamToken::all();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = EstelamToken::all();

            return Datatables::of($data)
                ->editColumn('appname', function ($data) {
                    return ($data->appname);
                })
                ->editColumn('token', function ($data) {
                    return ($data->token);
                })
                ->editColumn('refreshtoken', function ($data) {
                    return ($data->refreshtoken);
                })
                ->editColumn('exptime', function ($data) {
                    return ($data->exptime);
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('apikey-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.estelamkeys.all')
            ->with(compact(['menupanels' , 'submenupanels', 'estelams' , 'thispage']));
    }

    public function edit($id)
    {
        $estelams           = EstelamToken::first();
        $menupanels         = Menu_panel::whereStatus(4)->get();
        $submenupanels      = Submenu_panel::whereStatus(4)->get();
        return view('Admin.estelamkeys.edit')
            ->with(compact(['menupanels' , 'submenupanels', 'estelams']));

    }

    public function update(Request $request , $id)
    {

        $estelamkey = EstelamToken::findOrfail($id);
        $estelamkey->refreshtoken   = $request->input('refreshtoken');
        $estelamkey->token          = $request->input('token');
        $estelamkey->exptime        = $request->input('exptime');

        $result = $estelamkey->update();
        try{
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

}
