<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\mega_menu;
use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ConsultationController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت درخواست مشاوره',
            'list_title'    => 'لیست درخواست مشاوره',
            'add_title'     => 'افزودن درخواست مشاوره',
            'create_title'  => 'ایجاد درخواست مشاوره',
            'enter_title'   => 'ورود اطلاعات درخواست مشاوره',
        ];
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = Consultation::leftjoin('submenus' , 'submenus.id' , '=' , 'consultations.submenu')
                ->select('consultations.id', 'consultations.name', 'consultations.email', 'consultations.phone' ,'consultations.status','consultations.description' , 'submenus.title')->get();

            return Datatables::of($data)
                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('name', function ($data) {
                    return ($data->name);
                })
                ->addColumn('email', function ($data) {
                    return ($data->email);
                })
                ->addColumn('phone', function ($data) {
                    return ($data->phone);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('description', function ($data) {
                    return ($data->description);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    } elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->make(true);
        }

        return view('Admin.consultations.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت زیر منو سایت',
            'list_title'    => 'لیست زیر منو سایت',
            'add_title'     => 'افزودن زیر منو سایت',
            'create_title'  => 'ایجاد زیر منو سایت',
            'enter_title'   => 'ورود اطلاعات زیر منو سایت',
        ];
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();
        $menus          = Menu::whereSubmenu_route(1)->whereStatus(4)->orderBy('priority')->get();

        return view('Admin.submenus.create')
            ->with(compact(['menupanels' , 'submenupanels', 'menus' , 'thispage']));

    }

    public function store(Request $request )
    {

        try{
            $submenus = new Submenu();

            $submenus->title            = $request->input('title');
            $submenus->menu_id          = $request->input('menu_id');
            $submenus->tab_title        = $request->input('tab_title');
            $submenus->page_title       = $request->input('page_title');
            if($request->input('keyword')) {
                $submenus->keyword = json_encode(explode("،", $request->input('keyword')));
            }
            $submenus->page_description = $request->input('page_description');
            $submenus->footer_show      = $request->input('footer_show');
            $submenus->status           = $request->input('status');
            $submenus->user_id          = auth()->user()->id;
            if($request->hasfile('image')) {
                $file = $request->file('image');
                $imagePath  =public_path("submenus");
                $imagelink  ="submenus";
                $filename = Str::random(30) . "." . $file->clientExtension();
                $newImage = Image::make($file);
                $newImage->fit(480, 320);
                $submenus->image = $imagelink . '/' . $filename;
                $newImage->save($imagePath . '/' . $filename);
            }
            $result = $submenus->save();
            if ($result == true) {
                $success = true;
                $flag = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت ثبت شد';
            } else {
                $success = false;
                $flag = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'اطلاعات ثبت نشد، لطفا مجددا تلاش نمایید';
            }

        } catch (Exception $e) {

            $success = false;
            $flag = 'error';
            $subject = 'خطا در ارتباط با سرور';
            //$message = strchr($e);
            $message = 'اطلاعات ثبت نشد،لطفا بعدا مجدد تلاش نمایید ';
        }

        return response()->json(['success' => $success, 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
    }

    public function edit($id)
    {
        $thispage       = [
            'title'         => 'مدیریت زیر منو سایت',
            'list_title'    => 'لیست زیر منو سایت',
            'add_title'     => 'افزودن زیر منو سایت',
            'create_title'  => 'ایجاد زیر منو سایت',
            'enter_title'   => 'ورود اطلاعات زیر منو سایت',
            'edit_title'    => 'ویرایش اطلاعات زیر منو سایت',
        ];
        $submenus           = Submenu::whereId($id)->first();
        $megamenus          = mega_menu::all();
        $menupanels         = Menu_panel::whereStatus(4)->get();
        $submenupanels      = Submenu_panel::whereStatus(4)->get();
        $menus              = Menu::whereSubmenu(1)->get();

        return view('Admin.submenus.edit')
            ->with(compact(['menupanels' , 'submenupanels', 'submenus' , 'menus' , 'thispage' , 'megamenus']));

    }

    public function update(Request $request , $id)
    {
        try {
            $submenu                    = Submenu::findOrfail($id);
            $submenu->title             = $request->input('title');
            $submenu->menu_id           = $request->input('menu_id');
            $submenu->tab_title         = $request->input('tab_title');
            $submenu->page_title        = $request->input('page_title');
            $submenu->megamenu_id       = $request->input('megamenu_id');
            if($request->input('keyword')) {
                $submenu->keyword       = json_encode(explode("،", $request->input('keyword')));
            }
            $submenu->page_description  = $request->input('page_description');
            $submenu->footer_show       = $request->input('footer_show');
            $submenu->status            = $request->input('status');
            if($request->hasfile('image')) {
                $file = $request->file('image');
                $imagePath  =public_path("submenus");
                $imagelink  ="submenus";
                $filename = Str::random(30) . "." . $file->clientExtension();
                $newImage = Image::make($file);
                $newImage->fit(480, 320);
                $submenu->image = $imagelink . '/' . $filename;
                $newImage->save($imagePath . '/' . $filename);
            }
            $result = $submenu->update();
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

    public function deletesubmenus(Request $request)
    {
        try{
            $submenu = Submenu::findOrfail($request->input('id'));
            $result = $submenu->delete();

            if ($result == true) {
                $success = true;
                $flag    = 'success';
                $subject = 'عملیات موفق';
                $message = 'اطلاعات با موفقیت پاک شد';
            }else{
                $success = false;
                $flag    = 'error';
                $subject = 'عملیات ناموفق';
                $message = 'اطلاعات پاک نشد، لطفا مجددا تلاش نمایید';
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
