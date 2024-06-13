<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{

    public function index(Request $request)
    {
        $thispage       = [
            'title' => 'مدیریت اطلاعات (موسسه/شرکت)',
            'add_title' => 'افزودن موسسه/شرکت'
        ];
        $companies      =   Company::select('id')->get();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('companies')->get();

            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('tel', function ($data) {
                    return ($data->tel);
                })
                ->addColumn('mobile', function ($data) {
                    return ($data->mobile);
                })
                ->addColumn('email', function ($data) {
                    return ($data->email);
                })
                ->addColumn('ceo', function ($data) {
                    return ($data->ceo);
                })
                ->addColumn('image', function ($data) {
                    return '<img src="'.asset($data->image).'" class="img-rounded" align="center" />';

                })
                ->editColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('company-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action' , 'image'])
                ->make(true);
        }

        return view('Admin.companies.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'companies' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title' => 'ایجاد اطلاعات (موسسه/شرکت)',
        ];
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.companies.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'thispage']));
    }

    public function store(Request $request)
    {

        try{

            $companies = new Company();
            $companies->title           = $request->input('title');
            $companies->tel             = $request->input('tel');
            $companies->tel2            = $request->input('tel2');
            $companies->tel3            = $request->input('tel3');
            $companies->mobile          = $request->input('mobile');
            $companies->email           = $request->input('email');
            $companies->ceo             = $request->input('ceo');
            $companies->meli_code       = $request->input('meli_code');
            $companies->eghtesadi_code  = $request->input('eghtesadi_code');
            $companies->date_sabt       = $request->input('date_sabt');
            $companies->address         = $request->input('address');
            $companies->telegram        = $request->input('telegram');
            $companies->instagram       = $request->input('instagram');
            $companies->facebook        = $request->input('facebook');
            $companies->linkedin        = $request->input('linkedin');
            $companies->user_id         = Auth::user()->id;

            if ($request->file('image')) {

                $file       = $request->file('image');
                $imagePath  =public_path("companies");
                $imagelink  ="companies";
                $imageName1  = Str::random(30).".".$file->clientExtension();
                $favicon    = Image::make($file);
                $favicon->fit(80, 80);
                $companies->image = $imagelink.'/'.$imageName1;
                $favicon->save($imagePath .'/'. $imageName1);

                $imageName2  = Str::random(30).".".$file->clientExtension();
                $favicon16  = Image::make($file);
                $favicon16->resize(16, 16);
                $companies->favicon16 = $imagelink.'/'.$imageName2;
                $favicon16->save($imagePath .'/'. $imageName2);

                $imageName3  = Str::random(30).".".$file->clientExtension();
                $favicon32  = Image::make($file);
                $favicon32->resize(32, 32);
                $companies->favicon32 = $imagelink.'/'.$imageName3;
                $favicon32->save($imagePath .'/'. $imageName3);

            }

            $result = $companies->save();

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
            'title' => 'ویرایش اطلاعات (موسسه/شرکت)'
        ];
        $companies      =   Company::whereId($id)->first();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.companies.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'companies' , 'thispage']));

    }

    public function update(Request $request , $id)
    {
        try{
        $companies = Company::findOrfail($id);
        $companies->title           = $request->input('title');
        $companies->tel             = $request->input('tel');
        $companies->tel2            = $request->input('tel2');
        $companies->tel3            = $request->input('tel3');
        $companies->mobile          = $request->input('mobile');
        $companies->email           = $request->input('email');
        $companies->ceo             = $request->input('ceo');
        $companies->meli_code       = $request->input('meli_code');
        $companies->eghtesadi_code  = $request->input('eghtesadi_code');
        $companies->date_sabt       = $request->input('date_sabt');
        $companies->address         = $request->input('address');
        $companies->telegram        = $request->input('telegram');
        $companies->instagram       = $request->input('instagram');
        $companies->facebook        = $request->input('facebook');
        $companies->linkedin        = $request->input('linkedin');
        $companies->user_id         = Auth::user()->id;

            if ($request->file('image')) {

                $file       = $request->file('image');
                $imagePath  =public_path("companies");
                $imagelink  ="companies";
                $imageName1  = Str::random(30).".".$file->clientExtension();
                $favicon    = Image::make($file);
                $favicon->fit(80, 80);
                $companies->image = $imagelink.'/'.$imageName1;
                $favicon->save($imagePath .'/'. $imageName1);

                $imageName2  = Str::random(30).".".$file->clientExtension();
                $favicon16  = Image::make($file);
                $favicon16->resize(16, 16);
                $companies->favicon16 = $imagelink.'/'.$imageName2;
                $favicon16->save($imagePath .'/'. $imageName2);

                $imageName3  = Str::random(30).".".$file->clientExtension();
                $favicon32  = Image::make($file);
                $favicon32->resize(32, 32);
                $companies->favicon32 = $imagelink.'/'.$imageName3;
                $favicon32->save($imagePath .'/'. $imageName3);

            }

        $result = $companies->update();

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

    public function deletecompany(Request $request)
    {
        try {

            $companies = Company::findOrfail($request->input('id'));
            $result1 = $companies->delete();
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
