<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SubmenuRequest;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\permission;
use App\Models\Dashboard\Submenu_panel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SubmenudashboardController extends Controller
{

    public function index(Request $request)
    {
        $submenudashs   = Submenu_panel::all();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = Submenu_panel::
            join('menu_panels' ,'menu_panels.id' ,'=' ,'submenu_panels.menu_id')
            ->select('submenu_panels.id', 'submenu_panels.title', 'submenu_panels.slug', 'submenu_panels.status' , 'submenu_panels.class' , 'submenu_panels.controller' , 'submenu_panels.method' , 'menu_panels.title as menu_title')
                ->get();

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
                ->addColumn('menu_title', function ($data) {
                    return ($data->menu_title);
                })
                ->addColumn('class', function ($data) {
                    return ($data->class);
                })
                ->addColumn('controller', function ($data) {
                    return ($data->controller);
                })
                ->addColumn('method', function ($data) {
                    return ($data->method);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    } elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->editColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('submenu-dashboard.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.submenudashboards.all')
            ->with(compact(['menupanels' , 'submenupanels', 'submenudashs']));
    }

    public function create()
    {

        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        return view('Admin.submenudashboards.create')
            ->with(compact(['menupanels' , 'submenupanels']));

    }

    public function store(Request $request )
    {

        try {
        $submenu_panel = new Submenu_panel();

        $submenu_panel->method       = $request->input('method');
        $submenu_panel->title        = $request->input('title');
        $submenu_panel->label        = $request->input('label');
        $submenu_panel->class        = $request->input('class');
        $submenu_panel->controller   = $request->input('controller');
        $submenu_panel->menu_id      = $request->input('menu_id');
        $submenu_panel->user_id      = Auth::user()->id;
        $submenu_panel->status       = $request->input('status');

        $result1 = $submenu_panel->save();

        $permission = new Permission();
        $permission->title              = $request->input('title');
        $permission->label              = $request->input('label');
        $permission->submenu_panel_id   = $submenu_panel->id;
        $permission->user_id            = Auth::user()->id;

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


//        return redirect(route('submenudashboards.index'));
    }

    public function edit($id)
    {
        $submenus           = Submenu_panel::whereId($id)->get();
        $menupanels         = Menu_panel::whereStatus(4)->get();
        $submenupanels      = Submenu_panel::whereStatus(4)->get();
        return view('Admin.submenudashboards.edit')
            ->with(compact(['menupanels' , 'submenupanels', 'submenus']));

    }

    public function update(SubmenuRequest $request)
    {
        try{
        $submenu_panel = Submenu_panel::findOrfail($request->input('submenu_panel_id'));

        $submenu_panel->title        = $request->input('title');
        $submenu_panel->label        = $request->input('label');
        $submenu_panel->class        = $request->input('class');
        $submenu_panel->controller   = $request->input('controller');
        $submenu_panel->method       = $request->input('method');
        $submenu_panel->menu_id      = $request->input('menu_id');
        $submenu_panel->user_id      = Auth::user()->id;
        $submenu_panel->status       = $request->input('status');

        $result1 = $submenu_panel->save();

        $permission = Permission::whereSubmenu_panel_id($request->input('submenu_panel_id'))->first();
        $permission->title      = $request->input('title');
        $permission->label      = $request->input('label');
        $permission->user_id    = Auth::user()->id;

        $result2 = $permission->save();

        if ($result1 == true  && $result2 == true) {
            $success = true;
            $flag    = 'success';
            $subject = 'عملیات موفق';
            $message = 'اطلاعات زیرمنو با موفقیت ثبت شد';
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
            $message = 'اطلاعات زیرمنو ثبت نشد، لطفا مجددا تلاش نمایید';
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

    public function deletesubmenudashboards(Request $request)
    {
        try {
            $submenu_panel = Submenu_panel::findOrfail($request->input('id'));
            $result1 = $submenu_panel->delete();

            $permission = Permission::whereSubmenu_panel_id($request->input('id'))->first();
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
