<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Estelam;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use App\Models\TypeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class EstelamController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت استعلام',
            'list_title'    => 'لیست استعلام',
            'add_title'     => 'افزودن استعلام',
            'create_title'  => 'ایجاد استعلام',
            'enter_title'   => 'ورود اطلاعات استعلام',
        ];
        $stelams        = Estelam::all();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = Estelam::all();

            return Datatables::of($data)
                ->addColumn('priority', function ($data) {
                    return ($data->priority);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('title_fa', function ($data) {
                    return ($data->title_fa);
                })
                ->addColumn('action_route', function ($data) {
                    return ($data->action_route);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "فعال";
                    } elseif ($data->status == "4") {
                        return "غیر فعال";
                    }
                })
                ->editColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('estelam-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.estelams.all')
            ->with(compact(['menupanels' , 'submenupanels', 'stelams' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت استعلام',
            'list_title'    => 'لیست استعلام',
            'add_title'     => 'افزودن استعلام',
            'create_title'  => 'ایجاد استعلام',
            'enter_title'   => 'ورود اطلاعات استعلام',
        ];
        $typeusers      = TypeUser::where('id' , '>=', 2)->get();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();


        return view('Admin.estelams.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'thispage' , 'typeusers']));
    }

    public function store(Request $request)
    {

        try{
            $estelamcount = Estelam::orderBy('priority' , 'DESC')->first('priority');
            $estelam = new Estelam();

            $estelam->title            = $request->input('title');
            $estelam->title_fa         = $request->input('title_fa');
            $estelam->action_route     = $request->input('action_route');
            $estelam->status           = 4;
            $estelam->priority         = $estelamcount != null ? $estelamcount['priority'] + 1 : 1;
            $estelam->user_id          = Auth::user()->id;

            $result = $estelam->save();
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
            'title'         => 'مدیریت استعلام',
            'list_title'    => 'لیست استعلام',
            'add_title'     => 'افزودن استعلام',
            'create_title'  => 'ایجاد استعلام',
            'enter_title'   => 'ورود اطلاعات استعلام',
        ];
        $typeusers          = TypeUser::where('id' , '>=', 2)->get();
        $menus              = Menu::whereId($id)->first();
        $menupanels         = Menu_panel::whereStatus(4)->get();
        $submenupanels      = Submenu_panel::whereStatus(4)->get();
        return view('Admin.menus.edit')
            ->with(compact(['menupanels' , 'submenupanels', 'menus' , 'typeusers' , 'thispage']));

    }

    public function update(Request $request , $id)
    {

        $estelam = Estelam::findOrfail($id);
        $estelam->title        = $request->input('title');
        $estelam->title_fa     = $request->input('title_fa');
        $estelam->action_route = $request->input('action_route');
        $estelam->priority     = $request->input('priority');
        $estelam->user_id      = Auth::user()->id;
        $estelam->status       = $request->input('status');

        $result = $estelam->update();
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

    public function deleteestelam(Request $request)
    {
        try {
            $estelam = Estelam::findOrfail($request->input('id'));
            $result = $estelam->delete();
            if ($result == true) {
                $success = true;
                $flag = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت پاک شد';
            } else {
                $success = false;
                $flag = 'error';
                $subject = 'عملیات ناموفق';
                $message = 'اطلاعات پاک نشد، لطفا مجددا تلاش نمایید';
            }

        } catch (Exception $e) {

            $success = false;
            $flag = 'error';
            $subject = 'خطا در ارتباط با سرور';
            $message = 'اطلاعات پاک نشد،لطفا بعدا مجدد تلاش نمایید ';
        }
        return response()->json(['success' => $success, 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
    }
}
