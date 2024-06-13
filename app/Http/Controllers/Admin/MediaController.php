<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
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
