<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\MenuRequest;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\permission;
use App\Models\Dashboard\Submenu_panel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MenudashboardController extends Controller
{

    public function index(Request $request)
    {
        $menudashs          = Menu_panel::all();
        $menupanels         = Menu_panel::whereStatus(4)->get();
        $menu_panel_title   = Menu_panel::whereStatus(4)->get();
        $submenupanels      = Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = Menu_panel::select('id', 'title', 'slug', 'status' , 'class' , 'controller')->get();

            return Datatables::of($data)
                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('slug', function ($data) {
                    return ($data->slug);
                })
                ->addColumn('class', function ($data) {
                    return ($data->class);
                })
                ->addColumn('controller', function ($data) {
                    return ($data->controller);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    } elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->editColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('menu-dashboard.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.menudashboards.all')
            ->with(compact(['menupanels' , 'submenupanels', 'menudashs']));
    }

    public function create()
    {
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();


        return view('Admin.menudashboards.create')
            ->with(compact(['menupanels' , 'submenupanels']));
    }

    public function store(MenuRequest $request)
    {
        try {

        $menu_panel = new Menu_panel();
        $menu_panel->title        = $request->input('title');
        $menu_panel->label        = $request->input('label');
        $menu_panel->icon         = $request->input('icon');
        $menu_panel->submenu      = $request->input('submenu');
        $menu_panel->class        = $request->input('class');
        $menu_panel->controller   = $request->input('controller');
        $menu_panel->user_id      = Auth::user()->id;
        $menu_panel->status       = $request->input('status');

        $result1 = $menu_panel->save();

        $permission = new Permission();
        $permission->title          = $request->input('title');
        $permission->label          = $request->input('label');
        $permission->menu_panel_id  = $menu_panel->id;
        $permission->user_id        = Auth::user()->id;

        $result2 = $permission->save();

        if ($result1 == true  && $result2 == true) {
            $success = true;
            $flag    = 'success';
            $subject = 'عملیات موفق';
            $message = 'اطلاعات منو با موفقیت ثبت شد';
        }
        elseif($result1 == true  && $result2 != true) {
            $success = false;
            $flag    = 'error';
            $subject = 'عملیات نا موفق';
            $message = 'اطلاعات دسترسی ثبت نشد، لطفا مجددا تلاش نمایید';
        }
        elseif($result1 != true  && $result2 != true) {
            $success = false;
            $flag    = 'error';
            $subject = 'عملیات نا موفق';
            $message = 'اطلاعات منو ثبت نشد، لطفا مجددا تلاش نمایید';
        }

        } catch (Exception $e) {

            $success = false;
            $flag    = 'error';
            $subject = 'خطا در ارتباط با سرور';
            //$message = strchr($e);
            $message = 'اطلاعات منو ثبت نشد،لطفا بعدا مجدد تلاش نمایید ';
        }


        return response()->json(['success'=>$success , 'subject' => $subject, 'flag' => $flag, 'message' => $message]);

//        return redirect(route('menudashboards.index'));

    }

    public function edit($id)
    {
        $menus              = Menu_panel::whereId($id)->get();
        $menupanels         = Menu_panel::whereStatus(4)->get();
        $submenupanels      = Submenu_panel::whereStatus(4)->get();
        return view('Admin.menudashboards.edit')
            ->with(compact(['menupanels' , 'submenupanels', 'menus']));

    }

    public function update(MenuRequest $request)
    {

        try {
            $menu_panel = Menu_panel::whereId($request->input('menu_panel_id'))->first();
            $menu_panel->title        = $request->input('title');
            $menu_panel->label        = $request->input('label');
            $menu_panel->icon         = $request->input('icon');
            $menu_panel->submenu      = $request->input('submenu');
            $menu_panel->class        = $request->input('class');
            $menu_panel->controller   = $request->input('controller');
            $menu_panel->user_id      = Auth::user()->id;
            $menu_panel->status       = $request->input('status');

            $result1 = $menu_panel->save();

            $permission = Permission::whereMenu_panel_id($request->input('menu_panel_id'))->first();
            $permission->title      = $request->input('title');
            $permission->label      = $request->input('label');
            $permission->user_id    = Auth::user()->id;

            $result2 = $permission->save();

            if ($result1 == true  && $result2 == true) {
                $success = true;
                $flag    = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات منو با موفقیت ثبت شد';
            }
            elseif($result1 == true  && $result2 != true) {
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات دسترسی ثبت نشد، لطفا مجددا تلاش نمایید';
            }
            elseif($result1 != true  && $result2 != true) {
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات منو ثبت نشد، لطفا مجددا تلاش نمایید';
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

    public function deletemenudashboards(Request $request)
    {
        try {
            $menudashboard = Menu_panel::findOrfail($request->input('id'));
            $result1 = $menudashboard->delete();

            $permission = Permission::whereMenu_panel_id($request->input('id'))->first();
            $result2 = $permission->delete();


            if ($result1 == true  && $result2 == true) {
                $success = true;
                $flag = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت پاک شد';
            }elseif($result1 == true  && $result2 != true) {
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات دسترسی ثبت نشد، لطفا مجددا تلاش نمایید';
            }
            elseif($result1 != true  && $result2 != true) {
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
