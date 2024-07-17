<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use App\Models\TypeUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class MenuController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت منو سایت',
            'list_title'    => 'لیست منو سایت',
            'add_title'     => 'افزودن منو سایت',
            'create_title'  => 'ایجاد منو سایت',
            'enter_title'   => 'ورود اطلاعات منو سایت',
        ];
        $menus          = Menu::all();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = Menu::select('id', 'title', 'slug', 'status' , 'submenu', 'priority')
                ->orderBy('priority')->get();

            return Datatables::of($data)
                ->editColumn('title', function ($data) {
                    return ($data->title);
                })
                ->editColumn('slug', function ($data) {
                    return ($data->slug);
                })
                ->editColumn('priority', function ($data) {
                    return ($data->priority);
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    } elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->editColumn('submenu', function ($data) {
                    if ($data->submenu == 1) {
                        return "دارد";
                    } else {
                        return "ندارد";
                    }
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('menu-site-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.menus.all')
            ->with(compact(['menupanels' , 'submenupanels', 'menus' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت منو سایت',
            'list_title'    => 'لیست منو سایت',
            'add_title'     => 'افزودن منو سایت',
            'create_title'  => 'ایجاد منو سایت',
            'enter_title'   => 'ورود اطلاعات منو سایت',
        ];
        $typeusers      = TypeUser::whereLevel('site')->get();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();


        return view('Admin.menus.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'thispage' , 'typeusers']));
    }

    public function store(Request $request)
    {
//dd(json_encode($request->input('userlevel')));
        try{
            $menucount = Menu::orderBy('priority' , 'DESC')->first('priority');

            $menu = new Menu();

            $menu->title            = $request->input('title');
            $menu->tab_title        = $request->input('tab_title');
            $menu->page_title       = $request->input('page_title');
            if ($request->input('keyword')) {
                $menu->keyword = json_encode(explode("،", $request->input('keyword')));
            }
            $menu->page_description = $request->input('page_description');
            $menu->submenu          = $request->input('submenu');
            $menu->class            = $request->input('class');
            $menu->mega_menu        = $request->input('mega_menu');
            $menu->userlevel        = json_encode(explode("،", $request->input('userlevel')));
            $menu->mega_title1      = $request->input('mega_title1');
            $menu->mega_title2      = $request->input('mega_title2');
            $menu->mega_title3      = $request->input('mega_title3');
            $menu->mega_title4      = $request->input('mega_title4');
            $menu->submenu_route    = $request->input('submenu');
            $menu->status           = 4;
            $menu->priority         = $menucount['priority'] + 1;
            $menu->level            = $request->input('level');
            $menu->user_id          = Auth::user()->id;

            $result = $menu->save();
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
        $idmenus            = Menu::pluck('priority')->toArray();
        $priorities         = Menu::count();
        $s                  = $priorities + 5;
        $values             = range(1, $s);
        $menupanels         = Menu_panel::whereStatus(4)->get();
        $submenupanels      = Submenu_panel::whereStatus(4)->get();
        return view('Admin.menus.edit')
            ->with(compact(['menupanels' , 'submenupanels', 'menus' , 'typeusers' , 'values' , 'idmenus']));

    }

    public function update(Request $request , $id)
    {

        $menu = Menu::findOrfail($id);
        $menu->title            = $request->input('title');
        $menu->submenu          = $request->input('submenu');
        $menu->mega_menu        = $request->input('mega_menu');
        if ($request->input('userlevel')){
            $menu->userlevel        = json_encode(explode("،", $request->input('userlevel')));
        }
        $menu->priority         = $request->input('priority');
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

    public function deletemenus(Request $request)
    {
        try {
            $menu = Menu::findOrfail($request->input('id'));
            $result = $menu->delete();
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
