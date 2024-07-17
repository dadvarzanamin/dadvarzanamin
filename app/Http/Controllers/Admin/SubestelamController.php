<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Estelam;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Subestelam;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use App\Models\TypeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SubestelamController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت فیلد استعلام',
            'list_title'    => 'لیست فیلد استعلام',
            'add_title'     => 'افزودن فیلد استعلام',
            'create_title'  => 'ایجاد فیلد استعلام',
            'enter_title'   => 'ورود اطلاعات فیلد استعلام',
        ];
        $subestelams    = Subestelam::all();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = Subestelam::leftjoin('estelams' , 'estelams.id' , '=' , 'subestelams.estelam_id')->
                select('subestelams.id' , 'subestelams.name' , 'subestelams.type' , 'subestelams.label' , 'estelams.title_fa')->get();

            return Datatables::of($data)
                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('name', function ($data) {
                    return ($data->name);
                })
                ->addColumn('title_fa', function ($data) {
                    return ($data->title_fa);
                })
                ->addColumn('type', function ($data) {
                    return ($data->type);
                })
                ->addColumn('label', function ($data) {
                    return ($data->label);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "فعال";
                    } elseif ($data->status == "4") {
                        return "غیر فعال";
                    }
                })
                ->editColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('subestelam-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.subestelams.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'subestelams' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت فیلد استعلام',
            'list_title'    => 'لیست فیلد استعلام',
            'add_title'     => 'افزودن فیلد استعلام',
            'create_title'  => 'ایجاد فیلد استعلام',
            'enter_title'   => 'ورود اطلاعات فیلد استعلام',
        ];
        $estelams       = Estelam::all();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        return view('Admin.subestelams.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'thispage' , 'estelams']));
    }

    public function store(Request $request)
    {

        try{

            $subestelam = new Subestelam();

            $subestelam->name      = $request->input('name');
            $subestelam->type      = $request->input('type');
            $subestelam->label     = $request->input('label');
            $subestelam->estelam_id= $request->input('estelam_id');
            $subestelam->status    = 4;
            $subestelam->user_id   = Auth::user()->id;

            $result = $subestelam->save();
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
        $typeusers          = TypeUser::where('id' , '>=', 2)->get();
        $menus              = Menu::whereId($id)->first();
        $menupanels         = Menu_panel::whereStatus(4)->get();
        $submenupanels      = Submenu_panel::whereStatus(4)->get();
        return view('Admin.menus.edit')
            ->with(compact(['menupanels' , 'submenupanels', 'menus' , 'typeusers']));

    }

    public function update(Request $request , $id)
    {

        $menu = Menu::findOrfail($id);
        $menu->title            = $request->input('title');
        $menu->submenu          = $request->input('submenu');
        $menu->mega_menu        = $request->input('mega_menu');
        $menu->userlevel        = $request->input('userlevel');
        $menu->submenu_route    = $request->input('submenu');
        $menu->level            = $request->input('level');
        if ($request->input('keyword')) {
            $menu->keyword = json_encode(explode("،", $request->input('keyword')));
        }
        $menu->page_description = $request->input('description');
        $menu->status           = $request->input('status');

        $result = $menu->update();
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

    public function deletesubestelam(Request $request)
    {
        try {
            $subestelam = Subestelam::findOrfail($request->input('id'));
            $result = $subestelam->delete();
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
