<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Questionlist;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class QuestionlistController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت سوالات متداول',
            'list_title'    => 'لیست سوالات متداول',
            'add_title'     => 'افزودن سوالات متداول',
            'create_title'  => 'ایجاد سوالات متداول',
            'enter_title'   => 'ورود اطلاعات سوالات متداول',
            'edit_title'    => 'ویرایش اطلاعات سوالات متداول',
        ];
        $questionlists  =   Questionlist::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('questionlists')->leftJoin('submenus' , 'submenus.id' , '=' , 'questionlists.submenu_id')
                ->select('questionlists.id as id' , 'questionlists.answer as answer' , 'questionlists.question as question' , 'questionlists.status as status' , 'submenus.title as title')->get();

            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('answer', function ($data) {
                    return ($data->answer);
                })
                ->addColumn('question', function ($data) {
                    return ($data->question);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    }
                    elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })

                ->editColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('questionlist-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.questionlists.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'questionlists' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت سوالات متداول',
            'list_title'    => 'لیست سوالات متداول',
            'add_title'     => 'افزودن سوالات متداول',
            'create_title'  => 'ایجاد سوالات متداول',
            'enter_title'   => 'ورود اطلاعات سوالات متداول',
            'edit_title'    => 'ویرایش اطلاعات سوالات متداول',
        ];
        $submenus           =   Submenu::whereStatus(4)->get();
        $menupanels         =   Menu_panel::whereStatus(4)->get();
        $submenupanels      =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.questionlists.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'thispage' , 'submenus']));
    }

    public function store(Request $request)
    {

        try{

            $questionlists = new Questionlist();
            $questionlists->question    = $request->input('question');
            $questionlists->answer      = $request->input('answer');
            $questionlists->submenu_id  = $request->input('submenu_id');
            $questionlists->status      = $request->input('status');
            $questionlists->user_id     = Auth::user()->id;

            $result = $questionlists->save();
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
            'title'         => 'مدیریت سوالات متداول',
            'list_title'    => 'لیست سوالات متداول',
            'add_title'     => 'افزودن سوالات متداول',
            'create_title'  => 'ایجاد سوالات متداول',
            'enter_title'   => 'ورود اطلاعات سوالات متداول',
            'edit_title'    => 'ویرایش اطلاعات سوالات متداول',
        ];
        $questionlists      =   Questionlist::whereId($id)->first();
        $menupanels         =   Menu_panel::whereStatus(4)->get();
        $submenupanels      =   Submenu_panel::whereStatus(4)->get();
        $submenus           =   Submenu::whereStatus(4)->get();

        return view('Admin.questionlists.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'questionlists' , 'thispage' , 'submenus']));

    }

    public function update(Request $request, $id)
    {
        try {
            $questionlists = Questionlist::whereId($id)->first();
            $questionlists->question    = $request->input('question');
            $questionlists->answer      = $request->input('answer');
            $questionlists->submenu_id  = $request->input('submenu_id');
            $questionlists->status      = $request->input('status');

            $result = $questionlists->save();
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
    public function deletequestionlists(Request $request)
    {
        try{
            $questionlists = Questionlist::findOrfail($request->input('id'));
            $result = $questionlists->delete();

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
