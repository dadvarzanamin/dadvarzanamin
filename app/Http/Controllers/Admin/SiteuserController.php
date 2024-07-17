<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\role_user;
use App\Models\Dashboard\Submenu_panel;
use App\Models\TypeUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class SiteuserController extends Controller
{
    public function index(Request $request)
    {
        //dd('salam');
        //$this->authorize('user-manage');
        $users = \App\Models\User::latest()->paginate(10);
        $menupanels = Menu_panel::whereStatus(4)->get();
        $submenupanels = Submenu_panel::whereStatus(4)->get();
        $level = null;

        if ($request->ajax()) {
            if ($request->segments()[1] == 'user-dashboard') {
                $level = 'admin';
            } elseif ($request->segments()[1] == 'user-site-manage') {
                $level = 'site';
            }
            $data = User::select('id', 'name', 'username', 'email', 'phone', 'status')->whereLevel($level)->get();

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
                ->editColumn('phone', function ($data) {
                    return ($data->phone);
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    } elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('user-site-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal' . $data->id . '" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.siteusers.all')
            ->with(compact(['menupanels', 'submenupanels', 'users']));
    }
    public function create()
    {
        $menupanels         = Menu_panel::whereStatus(4)->get();
        $submenupanels      = Submenu_panel::whereStatus(4)->get();
        $types              = TypeUser::all();

        return view('Admin.siteusers.create')
            ->with(compact(['menupanels' , 'submenupanels', 'types']));

    }
    public function edit($id)
    {
        $users          = User::whereId($id)->get();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();
        $types          = TypeUser::all();

        return view('Admin.siteusers.edit')
            ->with(compact(['menupanels' , 'submenupanels', 'users' , 'types']));
    }

    public function update(Request $request , $user)
    {
        $user = User::findOrfail($user);
        $user->name         = $request->input('name');
        $user->type_id      = $request->input('type_id');
        $user->status       = $request->input('status');
        $user->state_status = $request->input('state_status');
        $user->phone        = $request->input('phone');
        $user->state_id     = $request->input('state_id');
        $user->city_id      = $request->input('city_id');
        $user->phone_verify = $request->input('phone_verify');
        $user->phone_number = $request->input('phone_number');
        $user->email        = $request->input('email');
        $user->address        = $request->input('address');
        if ($request->input('password') != null) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->update();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد');
        return redirect(route('siteusers.index'));
    }

    public function destroy($id)
    {

    }

    public function deleteuser($id)
    {
        User::findOrfail($id)->delete();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت پاک شد');
        return back();
    }
}
