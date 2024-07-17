<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Learnfile;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Post;
use App\Models\Dashboard\Submenu_panel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use TCPDF;
use Yajra\DataTables\Facades\DataTables;
//use setasign\Fpdi\Fpdi;
//use setasign\Fpdf\Fpdf;
use setasign\Fpdi\Tcpdf\Fpdi;

class LearnfileController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت فایل آموزشی ',
            'list_title'    => 'لیست فایل آموزشی',
            'add_title'     => 'افزودن فایل آموزشی',
            'create_title'  => 'ایجاد فایل آموزشی',
            'enter_title'   => 'ورود اطلاعات فایل آموزشی',
            'edit_title'    => 'ویرایش اطلاعات فایل آموزشی',
        ];
        $learnfiles     =   Learnfile::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('learnfiles')->get();

            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('description', function ($data) {
                    return ($data->description);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "عدم نمایش";
                    }
                    elseif ($data->status == "4") {
                        return "در حال نمایش";
                    }
                })
                ->addColumn('image', function ($data) {
                    return '<a href="' . route('learn-file-download', $data->id) . '" ><img src="' . asset($data->image) . '"  width="100" class="img-rounded" align="center" /></a>';
                })
                ->editColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('learn-file.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })

                ->rawColumns(['action' , 'image'])
                ->make(true);
        }

        return view('Admin.learnfiles.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'learnfiles' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت فایل آموزشی ',
            'list_title'    => 'لیست فایل آموزشی',
            'add_title'     => 'افزودن فایل آموزشی',
            'create_title'  => 'ایجاد فایل آموزشی',
            'enter_title'   => 'ورود اطلاعات فایل آموزشی',
            'edit_title'    => 'ویرایش اطلاعات فایل آموزشی',
        ];
        $menupanels         =   Menu_panel::whereStatus(4)->get();
        $submenupanels      =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.learnfiles.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'thispage']));
    }

    public function store(Request $request)
    {

        try{

            $learnfile = new Learnfile();
            $learnfile->title       = $request->input('title');
            $learnfile->description = $request->input('description');
            $learnfile->status      = $request->input('status');
            $learnfile->user_id     = Auth::user()->id;
            $id = md5(random_int(10 , 999999));

            if ($request->hasFile('file')) {
                $file              = $request->file('file');
                $Name              = md5(uniqid(rand(), true)) .'.'. $file->clientExtension();
                $Path              = "learnfiles/$id";
                $learnfile->file   = 'learnfiles/'.$id.'/'.$Name;
                $file->move($Path, $Name);
            }
            if ($request->hasFile('image')) {
                $cover = $request->file('image');
                $imagePath ="learnfiles/$id";
                $imageName = md5(uniqid(rand(), true)) .'.'. $cover->clientExtension();
                $learnfile->image = 'learnfiles/'.$id.'/'.$imageName;
                $cover->move($imagePath, $imageName);
            }
            $result = $learnfile->save();
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
            'title'         => 'مدیریت فایل آموزشی ',
            'list_title'    => 'لیست فایل آموزشی',
            'add_title'     => 'افزودن فایل آموزشی',
            'create_title'  => 'ایجاد فایل آموزشی',
            'enter_title'   => 'ورود اطلاعات فایل آموزشی',
            'edit_title'    => 'ویرایش اطلاعات فایل آموزشی',
        ];
        $learnfiles         =   Learnfile::whereId($id)->first();
        $menupanels         =   Menu_panel::whereStatus(4)->get();
        $submenupanels      =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.learnfiles.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'learnfiles' , 'thispage']));

    }

    public function update(Request $request, $id)
    {
        try {
            $learnfile = Learnfile::whereId($id)->first();
            $learnfile->title       = $request->input('title');
            $learnfile->description = $request->input('description');
            $learnfile->status      = $request->input('status');
            $learnfile->user_id     = Auth::user()->id;
            $id = md5(random_int(10 , 999999));

            if ($request->hasFile('file')) {
                $file              = $request->file('file');
                $Name              = md5(uniqid(rand(), true)) .'.'. $file->clientExtension();
                $Path              = "learnfiles/$id";
                $learnfile->file        = 'learnfiles/'.$id.'/'.$Name;
                $file->move($Path, $Name);
            }
            if ($request->hasFile('image')) {
                $cover = $request->file('image');
                $imagePath ="learnfiles/$id";
                $imageName = md5(uniqid(rand(), true)) .'.'. $cover->clientExtension();
                $learnfile->image = 'learnfiles/'.$id.'/'.$imageName;
                $cover->move($imagePath, $imageName);
            }
            $result = $learnfile->save();
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

    public function deletelearnfile(Request $request)
    {
        try{
            $learnfile = Learnfile::findOrfail($request->input('id'));
            $result = $learnfile->delete();

            if ($result == true) {
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

    public function download($id)
    {
        $pdfModel = Learnfile::findOrFail($id);
        $filePath = public_path($pdfModel->file);
        $mobileNumber = auth()->user()->phone;

        $pdf = new Fpdi();

        // تنظیمات اولیه
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('PDF Title');
        $pdf->SetSubject('PDF Subject');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // حذف هدر و فوتر پیش‌فرض
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // بارگذاری فایل PDF اصلی
        $pageCount = $pdf->setSourceFile($filePath);

        // پردازش هر صفحه از فایل PDF اصلی
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $pdf->AddPage();
            $tplIdx = $pdf->importPage($pageNo);
            $pdf->useTemplate($tplIdx, 0, 0);

            // تنظیم واترمارک
            $pdf->SetAlpha(0.2);
            $pdf->SetFont('helvetica', 'B', 70);
            $pdf->SetTextColor(255, 192, 203);
            $pdf->SetXY(300, 100); // تنظیم موقعیت واترمارک
            $pdf->StartTransform();
            $pdf->Rotate(45); // چرخاندن واترمارک
            $pdf->Text(30, 50, $mobileNumber);
            $pdf->StopTransform();

            // بازنشانی شفافیت
            $pdf->SetAlpha(1);
        }

        $outputDir = public_path('watermark/learnfiles/' . md5(auth()->id()));
        $outputFilePath = $outputDir . '/' . md5(basename($filePath)) . '.pdf';

        // اطمینان از وجود پوشه مقصد
        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        // ذخیره فایل PDF در مسیر نهایی
        $pdf->Output($outputFilePath, 'F');




//
//        $pdf = new TCPDF();
//
//        // تنظیمات اولیه
//        $pdf->SetCreator(PDF_CREATOR);
//        $pdf->SetAuthor('Your Name');
//        $pdf->SetTitle('PDF Title');
//        $pdf->SetSubject('PDF Subject');
//        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
//
//        // حذف هدر و فوتر پیش‌فرض
//        $pdf->setPrintHeader(false);
//        $pdf->setPrintFooter(false);
//
//        // اضافه کردن یک صفحه
//        $pdf->AddPage();
//
//        // تنظیم واترمارک
//        $pdf->SetAlpha(0.1);
//        $pdf->SetFont('helvetica', 'B', 50);
//        $pdf->Rotate(45, 55, 190);
//        $pdf->Text(35, 190, $mobileNumber);
//
//        // بازنشانی چرخش
//        $pdf->Rotate(0);
//
//        // اضافه کردن محتوای PDF (مثال)
//        $pdf->SetAlpha(1);
//        $pdf->SetFont('helvetica', '', 12);
//        $pdf->MultiCell(0, 0, 'این یک مثال از محتوای PDF است.', 0, 'L', 0, 1, '', '', true);
//
//        // خروجی PDF
//        $pdf->Output('example.pdf', 'D'); // 'D' برای دانلود




//        $pdf = new \TCPDF();
//
//        // تنظیمات اولیه
//        $pdf->SetCreator($filePath);
//        $pdf->SetAuthor('Aliakbarzade');
//        $pdf->SetTitle('Law course');
//        $pdf->SetSubject('PDF EXAM');
//        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
//        // حذف هدر و فوتر پیش‌فرض
//        $pdf->setPrintHeader(false);
//        $pdf->setPrintFooter(false);
//
//        // اضافه کردن یک صفحه
//        $pdf->AddPage();
//
//        // تنظیم واترمارک
//        $pdf->SetAlpha(0.1);
//        $pdf->SetFont('helvetica', 'B', 50);
//        $pdf->Rotate(45, 55, 190);
//        $pdf->Text(35, 190, 'mobile : ' . $mobileNumber);
//
//        // بازنشانی چرخش
//        $pdf->Rotate(0);
//
//        // اضافه کردن محتوای PDF (مثال)
//        $pdf->SetAlpha(1);
//        $pdf->SetFont('helvetica', '', 12);
//        $pdf->MultiCell(0, 0, 'این یک مثال از محتوای PDF است.', 0, 'L', 0, 1, '', '', true);
//
//        // خروجی PDF
//        //$pdf->Output('example.pdf', 'D'); // 'D' برای دانلود
//        $outputDir = public_path('watermark/learnfiles/' . md5(auth()->id()));
//        $outputFilePath = $outputDir . '/' . md5($pdfModel->file) . '.pdf';
//        if (!file_exists($outputDir)) {
//            mkdir($outputDir, 0777, true);
//        }
//        $pdf->Output($outputFilePath, 'D');


        // افزودن واترمارک
//        $pdf = new Fpdi();
//        $pageCount = $pdf->setSourceFile($filePath);
//
//        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
//            $pdf->AddPage();
//            $tplIdx = $pdf->importPage($pageNo);
//            $pdf->useTemplate($tplIdx, 0, 0);
//            $pdf->SetFont('Helvetica' , 'B' , 50);
//            $pdf->SetTextColor(255, 192, 203);
//            $pdf->SetXY(10, 10);
//            $pdf->Write(0, 'Mobile: ' . $mobileNumber);
//        }
//        $outputDir = public_path('watermark/learnfiles/' . md5(auth()->id()));
//        $outputFilePath = $outputDir . '/' . md5($pdfModel->file) . '.pdf';
//
//        // اطمینان از وجود پوشه مقصد
//        if (!file_exists($outputDir)) {
//            mkdir($outputDir, 0777, true);
//        }
//        // ذخیره فایل PDF در مسیر نهایی
//        $pdf->Output($outputFilePath, 'F');

        return response()->download($outputFilePath);
    }
}
