<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use App\Models\Profile\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class WorkshopController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت دوره های آموزشی',
            'list_title'    => 'لیست دوره های آموزشی',
            'add_title'     => 'افزودن دوره های آموزشی',
            'create_title'  => 'ایجاد دوره های آموزشی',
            'enter_title'   => 'ورود اطلاعات دوره های آموزشی',
        ];
        $workshops         =   Workshop::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('workshops')->get();

            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('teacher', function ($data) {
                    return ($data->teacher);
                })
                ->addColumn('date', function ($data) {
                    return ($data->date);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    }
                    elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->addColumn('teacher_image', function ($data) {
                    return '<img src="'.asset('storage'.$data->teacher_image).'" class="img-rounded" align="center" />';
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('workshop-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
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

        return view('Admin.workshops.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'workshops' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت دوره های آموزشی',
            'list_title'    => 'لیست دوره های آموزشی',
            'add_title'     => 'افزودن دوره های آموزشی',
            'create_title'  => 'ایجاد دوره های آموزشی',
            'enter_title'   => 'ورود اطلاعات دوره های آموزشی',
        ];
        $menus          =   Menu::whereStatus(4)->get();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.workshops.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'menus' , 'thispage']));
    }

    public function store(Request $request)
    {

        try{
            $workshops = new Workshop();
            $workshops->title           = $request->input('title');
            $workshops->teacher         = $request->input('teacher');
            $workshops->price           = $request->input('price');
            $workshops->offer           = $request->input('offer');
            $workshops->date            = $request->input('date');
            $workshops->teacher_resume  = $request->input('teacher_resume');
            if($request->input('type')) {
                $workshops->type = json_encode(explode('،', $request->input('type')));
            }
            $workshops->status      = $request->input('status');

            if ($request->file('file_link')) {

                $file       = $request->file('file_link');
                $imagePath  ="public/slides";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $workshops->teacher_image = 'workshop/'.$imageName;
                $file->storeAs($imagePath, $imageName);

            }

            $result = $workshops->save();

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
            'title'         => 'مدیریت دوره های آموزشی',
            'list_title'    => 'لیست دوره های آموزشی',
            'add_title'     => 'افزودن دوره های آموزشی',
            'create_title'  => 'ایجاد دوره های آموزشی',
            'enter_title'   => 'ورود اطلاعات دوره های آموزشی',
        ];
        $menus          =   Menu::whereStatus(4)->get();
        $workshops      =   Workshop::whereId($id)->first();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.workshops.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'workshops' , 'menus' , 'thispage']));

    }

    public function update(Request $request)
    {
        try{
            $workshops = Workshop::whereId($request->input('id'))->first();
            $workshops->title           = $request->input('title');
            $workshops->teacher         = $request->input('teacher');
            $workshops->price           = $request->input('price');
            $workshops->offer           = $request->input('offer');
            $workshops->date            = $request->input('date');
            $workshops->teacher_resume  = $request->input('teacher_resume');
            if($request->input('type')) {
                $workshops->type = json_encode(explode('،', $request->input('type')));
            }
            $workshops->status      = $request->input('status');

            if ($request->file('file_link')) {

                $file       = $request->file('file_link');
                $imagePath  ="public/slides";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $workshops->teacher_image = 'workshop/'.$imageName;
                $file->storeAs($imagePath, $imageName);

            }

            $result = $workshops->save();

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

    public function deleteworkshop(Request $request)
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
}
