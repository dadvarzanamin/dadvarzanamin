<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\mega_menu;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class MegamenuController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت مگامنو سایت',
            'list_title'    => 'لیست مگامنو سایت',
            'add_title'     => 'افزودن مگامنو سایت',
            'create_title'  => 'ایجاد مگامنو سایت',
            'enter_title'   => 'ورود اطلاعات مگامنو سایت',
        ];
        $megamenus      = mega_menu::all();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = mega_menu::select('id', 'title')->get();

            return Datatables::of($data)
                ->editColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('mega-menu-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.megamenus.all')
            ->with(compact(['menupanels' , 'submenupanels', 'megamenus' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت مگامنو سایت',
            'list_title'    => 'لیست مگامنو سایت',
            'add_title'     => 'افزودن مگامنو سایت',
            'create_title'  => 'ایجاد مگامنو سایت',
            'enter_title'   => 'ورود اطلاعات مگامنو سایت',
        ];
        $menus          = Menu::whereSubmenu_route(1)->whereStatus(4)->orderBy('priority')->get();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();


        return view('Admin.megamenus.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'thispage' , 'menus']));
    }

    public function store(Request $request)
    {
        $megamenu = new mega_menu();

        $megamenu->title            = $request->input('title');
        $megamenu->menu_id          = $request->input('menu_id');

        $result = $megamenu->save();
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

    public function edit($id)
    {
        $thispage       = [
            'title'         => 'مدیریت مگامنو سایت',
            'list_title'    => 'لیست مگامنو سایت',
            'add_title'     => 'افزودن مگامنو سایت',
            'create_title'  => 'ایجاد مگامنو سایت',
            'enter_title'   => 'ورود اطلاعات مگامنو سایت',
        ];
        $menus          = Menu::whereSubmenu_route(1)->whereStatus(4)->orderBy('priority')->get();
        $megamenus          = mega_menu::whereId($id)->first();
        $menupanels         = Menu_panel::whereStatus(4)->get();
        $submenupanels      = Submenu_panel::whereStatus(4)->get();
        return view('Admin.megamenus.edit')
            ->with(compact(['menupanels' , 'submenupanels', 'megamenus' , 'thispage' , 'menus']));

    }

    public function update(Request $request , $id)
    {
        try{
        $megamenu = mega_menu::findOrfail($id);

        $megamenu->title            = $request->input('title');
        $megamenu->menu_id          = $request->input('menu_id');

        $result = $megamenu->update();
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

    public function deletemegamenus(Request $request)
    {
        try {
            $megamenu = mega_menu::findOrfail($request->input('id'));
            $result = $megamenu->delete();
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
