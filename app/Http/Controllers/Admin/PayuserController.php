<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akhbar;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Invoice;
use App\Models\Profile\Workshopsign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class
PayuserController extends Controller
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
//            $data = DB::table('workshopsigns')
//                   ->select( 'workshopsigns.id', 'users.name as name' ,'users.phone as phone', 'users.father_name', 'users.national_id', 'users.birthday' , 'workshops.title as title'
//                                    ,'workshopsigns.typeuse', 'workshopsigns.created_at as date', 'workshopsigns.price', 'workshopsigns.pricestatus'
//                                    ,'workshopsigns.referenceId','workshopsigns.certificate')
//                   ->join('users', 'workshopsigns.user_id', '=', 'users.id')
//                   ->join('workshops', 'workshopsigns.workshop_id', '=', 'workshops.id')
//                   ->get();

            $data = Invoice::query()
                ->leftJoin('workshops', 'workshops.id', '=', 'invoices.product_id')
                ->leftJoin('contracts', 'contracts.id', '=', 'invoices.product_id')
                ->leftJoin('estelams', 'estelams.id', '=', 'invoices.product_id')
                ->leftJoin('users', 'users.id', '=', 'invoices.user_id')
                ->select(
                    'invoices.id',
                    'users.name',
                    'users.phone',
                    'users.national_id',
                    'users.birthday',
                    'users.father_name',
                    DB::raw('COALESCE(workshops.title, contracts.title, estelams.title) as product_title'),
                    'invoices.type_use',
                    'invoices.certificate',
                    'invoices.final_price',
                    'invoices.price_status',
                    'invoices.updated_at'
                )
                ->where('invoices.price_status', 4)
                ->get();


            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('name', function ($data) {
                    return ($data->name);
                })
                ->addColumn('title', function ($data) {
                    return ($data->product_title);
                })
                ->addColumn('phone', function ($data) {
                    return ($data->phone);
                })
                ->addColumn('date', function ($data) {
                    return (jdate($data->date)->format('Y/m/d'));
                })
                ->addColumn('typeuse', function ($data) {
                    if ($data->type_use == "1") {
                        return "حضوری";
                    }
                    elseif ($data->type_use == "2") {
                        return "آنلاین";
                    }
                })
                ->addColumn('final_price', function ($data) {
                    return (number_format($data->final_price));
                })
                ->addColumn('certificate', function ($data) {
                    if ($data->certificate == null) {
                        return "بدون گواهی";
                    }
                    elseif ($data->certificate == "1") {
                        return "نیاز به گواهی";
                    }
                })
                ->addColumn('father_name', function ($data) {
                    return ($data->father_name);
                })
                ->addColumn('national_id', function ($data) {
                    return ($data->national_id);
                })
                ->addColumn('birthday', function ($data) {
                    return ($data->birthday);
                })
                ->addColumn('pricestatus', function ($data) {
                    if ($data->price_status == null) {
                        return "عدم پرداخت";
                    }
                    elseif ($data->price_status == "4") {
                        return "پرداخت موفق";
                    }
                })
                ->make(true);
        }

        return view('Admin.payusers.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'workshopsigns' , 'thispage']));
    }

}
