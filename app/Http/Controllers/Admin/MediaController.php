<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Media;
use App\Models\Menu;
use App\Models\Submenu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت مدیا',
            'list_title'    => 'لیست مدیا',
            'add_title'     => 'افزودن مدیا',
            'create_title'  => 'ایجاد مدیا',
            'enter_title'   => 'ورود اطلاعات مدیا',
        ];
        $medias         =   Media::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('media')->leftjoin('submenus' , 'media.submenu_id' , '=' , 'submenus.id')
                ->select('submenus.title as submenus' , 'media.id', 'media.title', 'media.status', 'media.cover')
                ->get();

            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('submenus', function ($data) {
                    return ($data->submenus);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    }
                    elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->addColumn('cover', function ($data) {
                    return '<img src="'.asset('storage/'.$data->cover).'" class="img-rounded" align="center" />';
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('media-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
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
                ->rawColumns(['action' , 'file_link'])
                ->make(true);
        }

        return view('Admin.medias.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'medias' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت مدیا',
            'list_title'    => 'لیست مدیا',
            'add_title'     => 'افزودن مدیا',
            'create_title'  => 'ایجاد مدیا',
            'enter_title'   => 'ورود اطلاعات مدیا',
        ];
        $submenus       =   Submenu::whereStatus(4)->get();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.medias.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'submenus' , 'thispage']));
    }

    public function store(Request $request)
    {

        try{
            $medias = new Media();
           $medias->title       = $request->input('title');
           $medias->description = $request->input('description');
           $medias->aparat      = $request->input('aparat');
           $medias->status      = $request->input('status');
           $medias->submenu_id  = $request->input('submenu_id');
           $medias->user_id     = Auth::user()->id;
            if($request->input('keyword')) {
                $medias->keyword = json_encode(explode("،", $request->input('keyword')));
            }

            $id = md5(random_int(10 , 999999));

            if ($request->hasFile('file')) {
                $file              = $request->file('file');
                $Name              = md5(uniqid(rand(), true)) .'.'. $file->clientExtension();
                $Path              = "medias/$id";
                $medias->file_link        = 'medias/'.$id.'/'.$Name;
                $file->move($Path, $Name);
            }
            if ($request->hasFile('image')) {
                $cover = $request->file('image');
                $imagePath ="medias/$id";
                $imageName = md5(uniqid(rand(), true)) .'.'. $cover->clientExtension();
                $medias->cover = 'medias/'.$id.'/'.$imageName;
                $cover->move($imagePath, $imageName);
            }
            $result = $medias->save();
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
            'title'         => 'مدیریت مدیا',
            'list_title'    => 'لیست مدیا',
            'add_title'     => 'افزودن مدیا',
            'create_title'  => 'ایجاد مدیا',
            'enter_title'   => 'ورود اطلاعات مدیا',
        ];
        $menus          =   Menu::whereStatus(4)->get();
        $medias         =   Media::whereId($id)->first();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenus       =   Submenu::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.medias.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'medias' , 'menus' , 'thispage' , 'submenus']));

    }

    public function update(Request $request)
    {
        try{
            $medias = Media::whereId($request->input('media_id'))->first();
            $medias->title       = $request->input('title');
            $medias->description = $request->input('description');
            $medias->aparat      = $request->input('aparat');
            $medias->status      = $request->input('status');
            $medias->submenu_id  = $request->input('submenu_id');
            $medias->user_id     = Auth::user()->id;
            if($request->input('keyword')) {
                $medias->keyword = json_encode(explode("،", $request->input('keyword')));
            }

            $id = md5(random_int(10 , 999999));

            if ($request->hasFile('file')) {
                $file              = $request->file('file');
                $Name              = md5(uniqid(rand(), true)) .'.'. $file->clientExtension();
                $Path              = "medias/$id";
                $medias->file_link        = 'medias/'.$id.'/'.$Name;
                $file->move($Path, $Name);
            }
            if ($request->hasFile('image')) {
                $cover = $request->file('image');
                $imagePath ="medias/$id";
                $imageName = md5(uniqid(rand(), true)) .'.'. $cover->clientExtension();
                $medias->cover = 'medias/'.$id.'/'.$imageName;
                $cover->move($imagePath, $imageName);
            }
            $result = $medias->save();

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

    public function deletemedia(Request $request)
    {
        try {

            $media = Media::findOrfail($request->input('id'));
            $result1 = $media->delete();
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

    public function imgupload(Request $request)
    {

        if ($request->file('files')) {
            if (in_array($request->file('files')->getMimeType() , ['image/jpeg' , 'image/png' , 'image/bmp'])) {
               try{
                   $file =   $request->file('files');

                    $medias = new Media();

                    $medias->pic         = 1;
                    $medias->file_type   = $file->getMimeType();
                    $medias->file_size   = $file->getSize();
                    $medias->file_name   = $file->getClientOriginalName();

                    $img = Image::make($file);
                    $imagePath           = request('path');
                    $imageName           = md5(uniqid(rand(), true)) .'.'. $file->clientExtension();
                    $medias->file_link   = $file->storeAs($imagePath, $imageName);
                    $img->save($imagePath.$imageName);
                    $img->encode('jpg');
                    $result = true;
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

        }elseif(in_array($request->file('files')->getMimeType() , ['video/mp4' , 'video/quicktime'])){
                dd('salam');
                try{
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

            }elseif($request->file('files')->getMimeType() == 'audio/mp3'){
                    dd('salam');

                try{
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
        }else{
            $success = false;
            $flag    = 'error';
            $subject = 'عدم ارسال فایل';
            //$message = strchr($e);
            $message = 'فایلی برای ارسال وجود نداشت!';
            return response()->json(['success'=>$success , 'subject' => $subject, 'flag' => $flag, 'message' => $message]);
        }
    }

    public function destroy($id)
    {
        $media = Media::findOrfail($id);
        $media->delete();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت پاک شد');
        return Redirect::back();
    }
}
