<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Role;
use App\Models\Dashboard\Submenu_panel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LevelManageController extends Controller
{
    public function index(Request $request)
    {
        $roles          = Role::latest()->with('users')->paginate(20);
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        //$data = Role::with('users')->get();
//        $data = DB::table('role_user')
//            ->join('users' , 'users.id' , '=' , 'role_user.user_id')
//            ->join('roles' , 'roles.id' , '=' , 'role_user.role_id')
//        ->select('users.name as name' , 'users.username as username' , 'users.email as email' , 'roles.title as title' , 'users.status as status')->first();
//dd($data->name);
        if ($request->ajax()) {
            $data = DB::table('role_user')
                ->join('users' , 'users.id' , '=' , 'role_user.user_id')
                ->join('roles' , 'roles.id' , '=' , 'role_user.role_id')
                ->select('users.name as name' , 'users.username as username' , 'users.email as email' , 'roles.title as title' , 'users.status as status')
                ->get();

            return Datatables::of($data)
                ->editColumn('name', function ($data) {
                    return ($data->name);
                })
                ->editColumn('username', function ($data) {
                    return ($data->username);
                })
                ->editColumn('email', function ($data) {
                    return ($data->email);
                })
                ->editColumn('title', function ($data) {
                    return ($data->title);
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == "4") {
                        return "کاربر فعال";
                    } elseif ($data->status == "0") {
                        return "کاربر غیرفعال";
                    }
                })
//                ->addColumn('action', function ($data) {
//                    $actionBtn = '<a href="' . route('levelAdmins.edit', $data[0]->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
//                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data[0]->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';
//
//                    return $actionBtn;
//                })
                //->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.levelAdmins.all')
            ->with(compact(['menupanels' , 'submenupanels', 'roles']));
    }

    public function create()
    {
        $menupanels = Menu_panel::whereStatus(4)->get();
        $submenupanels = Submenu_panel::whereStatus(4)->get();
        return view('Admin.levelAdmins.create')
            ->with(compact(['menupanels' , 'submenupanels']));
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'user_id' => 'required',
            'role_id' => 'required'
        ]);
        try{
        $role = User::find($request->input('user_id'))->roles()->sync($request->input('role_id'));
            if ($role == true) {
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
        $user           = User::whereId($id)->get();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        return view('Admin.levelAdmins.edit')
            ->with(compact(['menupanels' , 'submenupanels', 'user']));

    }

    public function update(Request $request , User $user)
    {
        try{
        $role = $user->roles->sync($request->input('role_id'));
            if ($role == true) {
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

    public function destroy(Request $request)
    {
        try{

            $roles = Role::findOrfail($request->input('id'));
            $role = $roles->detach();

        if ($role == true) {
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
