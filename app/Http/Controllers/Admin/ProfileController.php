<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProfileRequest;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Role;
use App\Models\Dashboard\Submenu_panel;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $users          = User::select('id' , 'name' , 'image' , 'level')->where('type_id' , '>=' , auth()->user()->type_id)->get();
        $roles          = Role::select('id' , 'title')->where('id' , '>=' , auth()->user()->type_id)->get();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();
        return view('Admin.profile.all')
            ->with(compact(['menupanels' , 'submenupanels', 'roles' , 'users']));

    }
    public function update(ProfileRequest $request)
    {
        try {
            $user = User::findOrfail(auth()->user()->id);
            $user->name         = $request->input('name');
            $user->username     = $request->input('username');
            $user->email        = $request->input('email');
            $user->phone        = $request->input('mobile');
            $user->whatsapp     = $request->input('whatsapp');
            $user->instagram    = $request->input('instagram');
            $user->telegram     = $request->input('telegram');

            $result = $user->update();

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
}
