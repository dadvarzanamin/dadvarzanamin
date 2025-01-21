<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use App\Models\Offer;
use App\Models\Profile\Workshop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class OfferController extends Controller
{
    public function index(Request $request)
    {

        $thispage       = [
            'title'         => 'مدیریت تخفیفات',
            'list_title'    => 'لیست تخفیفات',
            'add_title'     => 'افزودن تخفیفات',
            'create_title'  => 'ایجاد تخفیفات',
            'enter_title'   => 'ورود اطلاعات تخفیفات',
        ];
        $offers      =   Offer::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('offers')
                ->leftJoin('workshops' ,'offers.workshop_id' ,'=' , 'workshops.id')
                ->leftJoin('users' ,'offers.user_offer' ,'=' , 'users.id')
                ->select('workshops.title' , 'offers.id' , 'offers.discount' , 'offers.percentage' , 'offers.status' , 'offers.offercode' , 'users.name')->get();

            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('discount', function ($data) {
                    return ($data->discount);
                })
                ->addColumn('percentage', function ($data) {
                    return ($data->percentage);
                })
                ->addColumn('offercode', function ($data) {
                    return ($data->offercode);
                })
                ->addColumn('name', function ($data) {
                    return ($data->name);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    }
                    elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('offer-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
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
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.offers.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'offers' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت تخفیفات',
            'list_title'    => 'لیست تخفیفات',
            'add_title'     => 'افزودن تخفیفات',
            'create_title'  => 'ایجاد تخفیفات',
            'enter_title'   => 'ورود اطلاعات تخفیفات',
        ];
        $workshops      =   Workshop::whereStatus(4)->get();
        $menus          =   Menu::whereStatus(4)->get();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();
        $users          =   User::select('id' , 'name')->get();

        return view('Admin.offers.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'menus' , 'thispage','users' , 'workshops']));
    }

    public function store(Request $request)
    {
        try{
            $offers = new Offer();
            $offers->user_offer   = $request->input('user_offer');
            $offers->workshop_id  = $request->input('workshop_id');
            $offers->discount     = $request->input('discount');
            $offers->percentage   = $request->input('percentage');
            $offers->status       = $request->input('status');
            $offers->user_id      = Auth::user()->id;

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@#$%';
            $randomCode = '';
            $length = 8;
            for ($i = 0; $i < $length; $i++) {
                $randomIndex = rand(0, strlen($characters) - 1);
                $randomCode .= $characters[$randomIndex];
            }

            $offers->offercode         = $randomCode;

            $result = $offers->save();

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
            'title'         => 'مدیریت تخفیفات',
            'list_title'    => 'لیست تخفیفات',
            'edit_title'    => 'ویرایش تخفیفات',
            'add_title'     => 'افزودن تخفیفات',
            'create_title'  => 'ایجاد تخفیفات',
            'enter_title'   => 'ورود اطلاعات تخفیفات',
        ];
        $menus          =   Menu::whereStatus(4)->get();
        $workshops      =   Workshop::all();
        $offers         =   Offer::whereId($id)->first();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();
        $users          =   User::select('id' , 'name')->get();

        return view('Admin.offers.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'offers' , 'menus' , 'thispage' , 'workshops', 'users']));

    }

    public function update(Request $request)
    {
        try{
            $offers = Offer::whereId($request->input('id'))->first();
            $offers->user_id        = Auth::user()->id;
            $offers->user_offer     = $request->input('user_offer');
            $offers->workshop_id    = $request->input('workshop_id');
            $offers->discount       = $request->input('discount');
            $offers->percentage     = $request->input('percentage');
            $offers->status         = $request->input('status');

            $result = $offers->save();

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

    public function deleteoffer(Request $request)
    {

        try {

            $offer = Offer::findOrfail($request->input('id'));
            $result1 = $offer->delete();
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
