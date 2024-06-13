<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\notif_user;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Profile\Notif;
use App\Models\TypeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class NotifController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت اعلانات',
            'list_title'    => 'لیست اعلانات',
            'add_title'     => 'افزودن اعلان',
            'create_title'  => 'ایجاد اعلان',
            'enter_title'   => 'ورود اعلانات',
            'edit_title'    => 'ویرایش اعلانات',
        ];
        $notifs          =   Notif::select('id')->get();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = Notif::all();

            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('level', function ($data) {
                    return ($data->level);
                })
                ->addColumn('description', function ($data) {
                    return strip_tags($data->description);
                })
                ->editColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('notif-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.notifs.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'notifs' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت اعلانات',
            'list_title'    => 'لیست اعلانات',
            'add_title'     => 'افزودن اعلان',
            'create_title'  => 'ایجاد اعلان',
            'enter_title'   => 'ورود اعلانات',
            'edit_title'    => 'ویرایش اعلانات',
        ];
        $typeusers      =   TypeUser::where('id' , '>=', 2)->get();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.notifs.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'thispage' , 'typeusers']));
    }

    public function store(Request $request)
    {

        try{

            $notifs = new Notif();
            $notifs->title           = $request->input('title');
            $notifs->description     = $request->input('description');
            $notifs->level           = $request->input('level');
            $notifs->user_id         = Auth::user()->id;

            $result = $notifs->save();
            if ($request->input('level') == 'all'){
                $notifs->users()->sync(User::pluck('id'));
            }else {
                $userid = str_replace('all,', '', $request->input('user_id'));
                $userid = explode(",", $userid);
                $notifs->users()->sync($userid);
            }
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
            'title'         => 'مدیریت اعلانات',
            'list_title'    => 'لیست اعلانات',
            'add_title'     => 'افزودن اعلان',
            'create_title'  => 'ایجاد اعلان',
            'enter_title'   => 'ورود اعلانات',
            'edit_title'    => 'ویرایش اعلانات',
        ];
        $typeusers      =   TypeUser::where('id' , '>=', 2)->get();
        $notifs         =   Notif::whereId($id)->first();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.notifs.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'notifs' , 'thispage' , 'typeusers']));

    }

    public function update(Request $request , $id)
    {
        try{
            $notifs = Notif::findOrfail($id);
            $notifs->title           = $request->input('title');
            $notifs->description     = $request->input('description');
            $notifs->level           = $request->input('level');
            $notifs->user_id         = Auth::user()->id;

            $result = $notifs->update();

            if ($request->input('level') == 'all'){
                $notifs->users()->sync(User::pluck('id'));
            }else {
                $userid = str_replace('all,', '', $request->input('user_id'));
                $userid = explode(",", $userid);
                $notifs->users()->sync($userid);
            }

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

    public function deletenotif(Request $request)
    {
        try {

            $notif = Notif::findOrfail($request->input('id'));
            $result1 = $notif->delete();
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

    public function getuser(Request $request){
        $users = User::whereType_id($request->input('level'))->get();
        $output = [];

        foreach($users as $user )
        {
            $output[$user->id] = $user->name;
        }

        return $output;
    }

    public function readnotif(Request $request){
        $user_id    = Auth::user()->id;
        $notif_id   = $request->input('id');

        $user_notif = notif_user::where('notif_id' , $notif_id)->where('user_id' ,  $user_id)->first();

        $user_notif->active = 0;
        $user_notif->save();

        return response()->json(['success'=>'success']);

    }
}
