<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Customer;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Portfolio;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use App\Models\Submenu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $portfolios     =   Portfolio::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('portfolios')
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
                ->addColumn('videos', function ($data) {
                    if($data->videos) {
                        return '<video controls width="100" <source src="' . asset('storage/' . $data->videos) . '" type="video/mp4"></video>';
                    }else{
                        return '';
                    }
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('portfolio-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })

                ->rawColumns(['action' , 'file_link' , 'videos'])
                ->make(true);
        }

        return view('Admin.portfolios.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'portfolios' ]));
    }

    public function create()
    {
        $customers      =   Customer::select('id' , 'name')->get();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $menus          =   Menu::whereStatus(4)->get();
        $submenus       =   Submenu::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.portfolios.create')
            ->with(compact(['menupanels' , 'submenupanels','customers' , 'menus' , 'submenus']));
    }

    public function store(Request $request)
    {
        try{
            $portfolios = new Portfolio();
            $portfolios->title       = $request->input('title');
            $portfolios->tags        = $request->input('title');
            $portfolios->customer_id = $request->input('customer_id');
            $portfolios->menu_id     = $request->input('menu_id');
            $portfolios->submenu_id  = $request->input('submenu_id');
            $portfolios->description = $request->input('text');
            $portfolios->status      = $request->input('status');
            $portfolios->user_id     = Auth::user()->id;

            if ($request->file('file_link')) {

                $file       = $request->file('file_link');
                $imagePath  ="public/portfolios/images";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $portfolios->file_link = 'portfolios/images/'.$imageName;
                $file->storeAs($imagePath, $imageName);

            }

            if ($request->hasfile('video')) {
                $file             = $request->file('video');
                $imagePath        ="public/portfolios/videos";
                $imageName        = Str::random(30).".".$file->clientExtension();
                $portfolios->videos = 'portfolios/videos/'.$imageName;
                $file->storeAs($imagePath, $imageName);
            }

            $result = $portfolios->save();

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
        $portfolios     =   Portfolio::whereId($id)->first();
        $customers      =   Customer::select('id' , 'name')->get();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();
        $menus          =   Menu::whereStatus(4)->get();
        $submenus       =   Submenu::whereStatus(4)->get();

        return view('Admin.portfolios.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'portfolios' , 'customers', 'menus' , 'submenus']));

    }

    public function update(Request $request)
    {
        try{
            $portfolios = Portfolio::whereId($request->input('Portfolio_id'))->first();
            $portfolios->title       = $request->input('title');
            $portfolios->customer_id = $request->input('customer_id');
            $portfolios->menu_id     = $request->input('menu_id');
            $portfolios->submenu_id  = $request->input('submenu_id');
            $portfolios->description = $request->input('text');
            $portfolios->status      = $request->input('status');

            if ($request->hasfile('file_link')) {
                $file             = $request->file('file_link');
                $imagePath        ="public/portfolios/images";
                $imageName        = Str::random(30).".".$file->clientExtension();
                $portfolios->file_link = 'portfolios/images/'.$imageName;
                $file->storeAs($imagePath, $imageName);
            }

            if ($request->hasfile('video')) {
                $file             = $request->file('video');
                $imagePath        ="public/portfolios/videos";
                $imageName        = Str::random(30).".".$file->clientExtension();
                $portfolios->videos = 'portfolios/videos/'.$imageName;
                $file->storeAs($imagePath, $imageName);
            }

            $result = $portfolios->save();

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

    public function deleteportfolios(Request $request)
    {
        try {

            $portfolios = Portfolio::findOrfail($request->input('id'));
            $result1 = $portfolios->delete();
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
