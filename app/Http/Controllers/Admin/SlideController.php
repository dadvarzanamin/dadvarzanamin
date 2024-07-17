<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Slide;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class SlideController extends Controller
{

    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت اسلاید',
            'list_title'    => 'لیست اسلاید',
            'add_title'     => 'افزودن اسلاید',
            'create_title'  => 'ایجاد اسلاید',
            'enter_title'   => 'ورود اطلاعات اسلاید',
        ];
        $slides         =   Slide::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('slides')->leftjoin('menus' , 'slides.menu_id' , '=' , 'menus.id')
                ->select('menus.title as menu' , 'slides.id', 'slides.title1', 'slides.title2', 'slides.title3', 'slides.word', 'slides.status', 'slides.file_link')
                ->get();

            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('title1', function ($data) {
                    return ($data->title1);
                })
                ->addColumn('title2', function ($data) {
                    return ($data->title2);
                })
                ->addColumn('word', function ($data) {
                    return (json_decode($data->word));
                })
                ->addColumn('menu', function ($data) {
                    return ($data->menu);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    }
                    elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->addColumn('file_link', function ($data) {
                    return '<img src="'.asset('storage/'.$data->file_link).'" class="img-rounded" align="center" />';
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('slide-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
//                ->addColumn('action', function ($row) {
//                    $actionBtn = '<a href="' . route('slide-manage.edit', $row->id) . '" class="btn ripple btn-outline-info btn-sm">Edit</a>
//                                <form action="' . route('slide-manage.destroy' ,$row->id) .'" method="post"  style="display: inline;">
//                                    '.csrf_field().'
//                                    '.method_field("DELETE").'
//                                         <button type="submit" class="btn ripple btn-outline-danger btn-sm">
//                                             <i class="fe fe-trash-2 "></i>
//                                         </button>
//                                </form>';
//                    return $actionBtn;
//                })
                ->rawColumns(['action' , 'file_link'])
                ->make(true);
        }

        return view('Admin.slides.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'slides' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت اسلاید',
            'list_title'    => 'لیست اسلاید',
            'add_title'     => 'افزودن اسلاید',
            'create_title'  => 'ایجاد اسلاید',
            'enter_title'   => 'ورود اطلاعات اسلاید',
        ];
        $menus          =   Menu::whereStatus(4)->get();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.slides.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'menus' , 'thispage']));
    }

    public function store(Request $request)
    {

        try{
            $slides = new Slide();
            $slides->title1      = $request->input('title1');
            $slides->title2      = $request->input('title2');
            $slides->title3      = $request->input('title3');
            $slides->menu_id     = $request->input('menu_id');
            $slides->text        = $request->input('text');
            if($request->input('word')) {
                $slides->word = json_encode(explode('،', $request->input('word')));
            }
            $slides->status      = $request->input('status');
            $slides->user_id     = Auth::user()->id;

            if ($request->file('file_link')) {

                $file       = $request->file('file_link');
                $imagePath  ="public/slides";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $slides->file_link = 'slides/'.$imageName;
                $file->storeAs($imagePath, $imageName);

            }

            $result = $slides->save();

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
            'title'         => 'مدیریت اسلاید',
            'list_title'    => 'لیست اسلاید',
            'add_title'     => 'افزودن اسلاید',
            'create_title'  => 'ایجاد اسلاید',
            'enter_title'   => 'ورود اطلاعات اسلاید',
        ];
        $menus          =   Menu::whereStatus(4)->get();
        $slides         =   Slide::whereId($id)->first();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.slides.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'slides' , 'menus' , 'thispage']));

    }

    public function update(Request $request)
    {
        try{
            $slide = Slide::whereId($request->input('slide_id'))->first();
            $slide->title1      = $request->input('title1');
            $slide->title2      = $request->input('title2');
            $slide->title3      = $request->input('title3');
            $slide->menu_id     = $request->input('menu_id');
            $slide->text        = $request->input('text');
            if($request->input('word')) {
                $slide->word = json_encode(explode('،', $request->input('word')));
            }
            $slide->status      = $request->input('status');

            if ($request->hasfile('file_link')) {
                $file             = $request->file('file_link');
                $imagePath        ="public/slides";
                $imageName        = Str::random(30).".".$file->clientExtension();
                $slide->file_link = 'slides/'.$imageName;
                $file->storeAs($imagePath, $imageName);
            }

            $result = $slide->save();

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

    public function deleteslide(Request $request)
    {
        try {

            $slide = Slide::findOrfail($request->input('id'));
            $result1 = $slide->delete();
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

    public function slidetype(Request $request){

        if ($request->input('id') == 'external'){

           $output[] = 'external';

            return $output;
        }elseif ($request->input('id') == 'technical'){
            $cities = Technical_unit::whereStatus(4)->get();
            $output = [];

            foreach($cities as $City )
            {
                $output[$City->slug] = $City->title;
            }

            return $output;
        }elseif ($request->input('id') == 'supplier'){
            $cities = Supplier::whereStatus(4)->get();
            $output = [];

            foreach($cities as $City )
            {
                $output[$City->slug] = $City->title;
            }

            return $output;
        }elseif ($request->input('id') == 'offer'){
            $cities = Offer::whereStatus(4)->get();
            $output = [];

            foreach($cities as $City )
            {
                $output[$City->slug] = $City->title;
            }

            return $output;
        }
        elseif ($request->input('id') == 'product'){
            $cities = Product::whereStatus(4)->get();
            $output = [];

            foreach($cities as $City )
            {
                $output[$City->slug] = $City->title;
            }

            return $output;
        }

    }

}
