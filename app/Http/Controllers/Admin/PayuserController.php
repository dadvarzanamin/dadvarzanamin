<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akhbar;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Profile\Workshopsign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class PayuserController extends Controller
{

    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت پرداخت ها',
            'list_title'    => 'لیست پرداخت ها',
            'add_title'     => 'افزودن پرداخت ها',
            'create_title'  => 'ایجاد پرداخت ها',
            'enter_title'   => 'ورود اطلاعات پرداخت ها',
            'edit_title'    => 'ویرایش اطلاعات پرداخت ها',
        ];
        $workshopsigns  =   Workshopsign::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('workshopsigns')
                   ->select( 'workshopsigns.id', 'users.name as name' ,'users.phone as phone' , 'workshops.title as title', 'workshopsigns.typeuse', 'workshopsigns.created_at as date', 'workshopsigns.price', 'workshopsigns.pricestatus', 'workshopsigns.referenceId')
                   ->join('users', 'workshopsigns.user_id', '=', 'users.id')
                   ->join('workshops', 'workshopsigns.workshop_id', '=', 'workshops.id')
                   ->get();


            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('name', function ($data) {
                    return ($data->name);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('phone', function ($data) {
                    return ($data->phone);
                })
                ->addColumn('date', function ($data) {
                    return (jdate($data->date)->format('y/m/d'));
                })
                ->addColumn('typeuse', function ($data) {
                    if ($data->typeuse == "1") {
                        return "حضوری";
                    }
                    elseif ($data->typeuse == "2") {
                        return "آنلاین";
                    }
                })
                ->addColumn('price', function ($data) {
                    return ($data->price);
                })
                ->addColumn('pricestatus', function ($data) {
                    if ($data->pricestatus == null) {
                        return "عدم پرداخت";
                    }
                    elseif ($data->pricestatus == "4") {
                        return "پرداخت موفق";
                    }
                })
                ->addColumn('referenceId', function ($data) {
                    return ($data->referenceId);
                })
                ->make(true);
        }

        return view('Admin.payusers.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'workshopsigns' , 'thispage']));
    }

}
