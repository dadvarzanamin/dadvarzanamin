<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akhbar;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class AkhbarController extends Controller
{

    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت اخبار و رویدادها',
            'list_title'    => 'لیست اخبار و رویدادها',
            'add_title'     => 'افزودن اخبار و رویدادها',
            'create_title'  => 'ایجاد اخبار و رویدادها',
            'enter_title'   => 'ورود اطلاعات اخبار و رویدادها',
            'edit_title'    => 'ویرایش اطلاعات اخبار و رویدادها',
        ];
        $akhbars        =   Akhbar::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('akhbars')
                //->join('menus' , 'slides.menu_id' , '=' , 'menus.id')
                //->select('menus.title as menu' , 'slides.id', 'slides.title1', 'slides.title2', 'slides.title3', 'slides.status', 'slides.file_link')
                ->get();

            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
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
                    }
                    elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset($data->image) . '"  width="100" class="img-rounded" align="center" />';
                })
                ->editColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('akhbar-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })

                ->rawColumns(['action' , 'image'])
                ->make(true);
        }

        return view('Admin.akhbars.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'akhbars' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت اخبار و رویدادها',
            'list_title'    => 'لیست اخبار و رویدادها',
            'add_title'     => 'افزودن اخبار و رویدادها',
            'create_title'  => 'ایجاد اخبار و رویدادها',
            'enter_title'   => 'ورود اطلاعات اخبار و رویدادها',
            'edit_title'    => 'ویرایش اطلاعات اخبار و رویدادها',
        ];
        $menupanels         =   Menu_panel::whereStatus(4)->get();
        $submenupanels      =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.akhbars.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'thispage']));
    }

    public function store(Request $request)
    {
        try{

            $akhbars = new Akhbar();
            $akhbars->title       = $request->input('title');
            $akhbars->description = $request->input('description');
            if($request->input('keyword')) {
                $akhbars->keyword = json_encode(explode("،", $request->input('keyword')));
            }            $akhbars->status      = $request->input('status');
            $akhbars->home_show   = $request->input('home_show');
            $akhbars->user_id     = Auth::user()->id;
            if($request->hasfile('image')) {
                $file = $request->file('image');
                $imagePath  =public_path("akhbars");
                $imagelink  ="akhbars";
                $filename = Str::random(30) . "." . $file->clientExtension();
                $newImage = Image::make($file);
                $newImage->fit(480, 320);
                $akhbars->image = $imagelink . '/' . $filename;
                $newImage->save($imagePath . '/' . $filename);
            }
            $result = $akhbars->save();
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $thispage       = [
            'title'         => 'مدیریت اخبار و رویدادها',
            'list_title'    => 'لیست اخبار و رویدادها',
            'add_title'     => 'افزودن اخبار و رویدادها',
            'create_title'  => 'ایجاد اخبار و رویدادها',
            'enter_title'   => 'ورود اطلاعات اخبار و رویدادها',
            'edit_title'    => 'ویرایش اطلاعات اخبار و رویدادها',
        ];
        $akhbars            =   Akhbar::whereId($id)->first();
        $menupanels         =   Menu_panel::whereStatus(4)->get();
        $submenupanels      =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.akhbars.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'akhbars' , 'thispage']));

    }

    public function update(Request $request, $id)
    {
        try {
        $akhbar = Akhbar::whereId($id)->first();
        $akhbar->title         = $request->input('title');
        $akhbar->home_show     = $request->input('homeshow');
            if($request->input('keyword')) {
                $akhbar->keyword = json_encode(explode("،", $request->input('keyword')));
            }        $akhbar->description   = $request->input('description');
        $akhbar->status        = $request->input('status');
        $akhbar->user_id       = Auth::user()->id;

        if($request->hasfile('image')) {
            $file = $request->file('image');
            $imagePath  =public_path("akhbars");
            $imagelink  ="akhbars";
            $filename = Str::random(30) . "." . $file->clientExtension();
            $newImage = Image::make($file);
            $newImage->fit(480, 320);
            $akhbar->image = $imagelink . '/' . $filename;
            $newImage->save($imagePath . '/' . $filename);
        }
        $result = $akhbar->save();
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

    public function deleteakhbar(Request $request)
    {
        try{
            $akhbar = Akhbar::findOrfail($request->input('id'));
            $result = $akhbar->delete();

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
