<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Blug;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class BlugController extends Controller
{
    public function index(Request $request)
    {
        $blugs          =   Blug::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('blugs')
                //->join('menus' , 'slides.menu_id' , '=' , 'menus.id')
                //->select('menus.title as menu' , 'slides.id', 'slides.title1', 'slides.title2', 'slides.title3', 'slides.status', 'slides.file_link')
                ->get();

            return Datatables::of($data)

                ->editColumn('id', function ($data) {
                    return ($data->id);
                })
                ->editColumn('title', function ($data) {
                    return ($data->title);
                })
                ->editColumn('description', function ($data) {
                    return ($data->description);
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    }
                    elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->addColumn('file_link', function ($data) {
                    return '<img src="'.asset('storage/'.$data->file_link).'"  width="100" class="img-rounded" align="center" />';
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('blug-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action' , 'file_link'])
                ->make(true);
        }

        return view('Admin.blugs.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'blugs' ]));
    }

    public function create()
    {
        $blugs          =   Blug::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.blugs.create')
            ->with(compact(['menupanels' , 'submenupanels','blugs']));
    }

    public function store(Request $request)
    {
        try{
            $blugs = new Blug();
            $blugs->title           = $request->input('title');
            $blugs->description     = $request->input('text');
            $blugs->status          = $request->input('status');
            $blugs->user_id         = Auth::user()->id;

            if ($request->file('file_link')) {

                $file       = $request->file('file_link');
                $imagePath  ="public/blugs/images";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $blugs->file_link = 'blugs/images/'.$imageName;
                $file->storeAs($imagePath, $imageName);

            }
            $result = $blugs->save();

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
        $blugs          =   Blug::whereId($id)->first();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.blugs.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'blugs']));

    }

    public function update(Request $request)
    {
        try{
            $blugs = Blug::whereId($request->input('blug_id'))->first();
            $blugs->title       = $request->input('title');
            $blugs->description = $request->input('text');
            $blugs->status      = $request->input('status');

            if ($request->hasfile('file_link')) {
                $file             = $request->file('file_link');
                $imagePath        ="public/blugs/images";
                $imageName        = Str::random(30).".".$file->clientExtension();
                $blugs->file_link = 'blugs/images/'.$imageName;
                $file->storeAs($imagePath, $imageName);
            }

            $result = $blugs->save();

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

    public function deleteblugs(Request $request)
    {
        try {
            $blugs = Blug::findOrfail($request->input('id'));
            $result1 = $blugs->delete();
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
