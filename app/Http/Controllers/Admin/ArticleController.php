<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use App\Models\Profile\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت مقالات',
            'list_title'    => 'لیست مقالات',
            'add_title'     => 'افزودن مقالات',
            'create_title'  => 'ایجاد مقالات',
            'enter_title'   => 'ورود اطلاعات مقالات',
        ];
        $articles       =   Article::all();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = DB::table('articles')->get();

            return Datatables::of($data)

                ->addColumn('id', function ($data) {
                    return ($data->id);
                })
                ->addColumn('title', function ($data) {
                    return ($data->title);
                })
                ->addColumn('price', function ($data) {
                    return ($data->price);
                })
                ->addColumn('offer', function ($data) {
                    return ($data->offer);
                })
                ->addColumn('type', function ($data) {
                    return ($data->type);
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == "0") {
                        return "غیر فعال";
                    }
                    if ($data->status == "1") {
                        return "اتمام ظرفیت";
                    }
                    if ($data->status == "2") {
                        return "پایان زمان ثبت نام";
                    }
                    if ($data->status == "3") {
                        return "پایان دوره";
                    }
                    elseif ($data->status == "4") {
                        return "درحال ثبت نام";
                    }
                })
                ->addColumn('image', function ($data) {
                    return '<img src="'.asset('storage'.$data->image).'" class="img-rounded" align="center" />';
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('article-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                                       <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';
                    return $actionBtn;
                })

                ->rawColumns(['action' , 'file_link'])
                ->make(true);
        }

        return view('Admin.articles.all')
            ->with(compact(['menupanels' , 'submenupanels' , 'articles' , 'thispage']));
    }

    public function create()
    {
        $thispage       = [
            'title'         => 'مدیریت مقالات',
            'list_title'    => 'لیست مقالات',
            'add_title'     => 'افزودن مقالات',
            'create_title'  => 'ایجاد مقالات',
            'enter_title'   => 'ورود اطلاعات مقالات',
        ];
        $menus          =   Menu::whereStatus(4)->get();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.articles.create')
            ->with(compact(['menupanels' , 'submenupanels' , 'menus' , 'thispage']));
    }

    public function store(Request $request)
    {
        try{
            $articles = new Article();
            $articles->title           = $request->input('title');
            $articles->price           = $request->input('price');
            $articles->date            = $request->input('date');
            $articles->description     = $request->input('description');
            if($request->input('type')) {
                $articles->type = json_encode(explode('،', $request->input('type')));
            }
            $articles->status      = $request->input('status');

            if ($request->file('image')) {
                $file       = $request->file('image');
                $imagePath  ="public/articles";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $articles->image = 'articles/'.$imageName;
                $file->storeAs($imagePath, $imageName);
            }
            if ($request->file('file_link')) {
                $file       = $request->file('file_link');
                $imagePath  ="public/articles";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $articles->file_link = 'articles/'.$imageName;
                $file->storeAs($imagePath, $imageName);
            }

            $result = $articles->save();

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
            'title'         => 'مدیریت مقالات',
            'list_title'    => 'لیست مقالات',
            'add_title'     => 'افزودن مقالات',
            'create_title'  => 'ایجاد مقالات',
            'enter_title'   => 'ورود اطلاعات مقالات',
        ];
        $menus          =   Menu::whereStatus(4)->get();
        $articles       =   Article::whereId($id)->first();
        $menupanels     =   Menu_panel::whereStatus(4)->get();
        $submenupanels  =   Submenu_panel::whereStatus(4)->get();

        return view('Admin.articles.edit')
            ->with(compact(['menupanels' , 'submenupanels'  , 'articles' , 'menus' , 'thispage']));

    }

    public function update(Request $request)
    {
        try{
            $article = Article::whereId($request->input('id'))->first();
            $article->title           = $request->input('title');
            $article->price           = $request->input('price');
            $article->date            = $request->input('date');
            $article->description     = $request->input('description');
            if($request->input('type')) {
                $article->type = json_encode(explode('،', $request->input('type')));
            }
            $article->status      = $request->input('status');

            if ($request->file('image')) {
                $file       = $request->file('image');
                $imagePath  ="public/articles";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $article->image = 'articles/'.$imageName;
                $file->storeAs($imagePath, $imageName);
            }
            if ($request->file('file_link')) {
                $file       = $request->file('file_link');
                $imagePath  ="public/articles";
                $imageName  = Str::random(30).".".$file->clientExtension();
                $article->file_link = 'articles/'.$imageName;
                $file->storeAs($imagePath, $imageName);
            }

            $result = $article->save();

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
    public function deletarticle(Request $request)
    {
        try {

            $article = Article::findOrfail($request->input('id'));
            $result1 = $article->delete();
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
