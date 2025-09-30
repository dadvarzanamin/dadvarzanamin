<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\APP\documentDrafting;
use App\Models\APP\contractDrafting;
use App\Models\APP\legalAdvice     ;
use App\Models\APP\judgement       ;
use App\Models\APP\lawsuit         ;
use App\Models\APP\tokil           ;
class RequestmentController extends Controller
{
        public function index(Request $request)
        {
            $thispage       = [
                'title'         => 'مدیریت منو سایت',
                'list_title'    => 'لیست منو سایت',
                'add_title'     => 'افزودن منو سایت',
                'create_title'  => 'ایجاد منو سایت',
                'enter_title'   => 'ورود اطلاعات منو سایت',
            ];
            $menus          = Menu::all();
            $menupanels     = Menu_panel::whereStatus(4)->get();
            $submenupanels  = Submenu_panel::whereStatus(4)->get();


            $models = [
                'documentDrafting' => \App\Models\APP\DocumentDrafting::class,
                'contractDrafting' => \App\Models\APP\ContractDrafting::class,
                'legalAdvice'      => \App\Models\APP\LegalAdvice::class,
                'judgement'        => \App\Models\APP\Judgement::class,
                'lawsuit'          => \App\Models\APP\Lawsuit::class,
                'tokil'            => \App\Models\APP\Tokil::class,
            ];

            $data = [];

            foreach ($models as $key => $modelClass) {
                // اینجا get() روی Query/Model اجرا میشه — نه روی Collection
                $data[$key] = $modelClass::latest()->get();
            }
            dd($data);

            if ($request->ajax()) {
                return Datatables::of($data)
                    ->editColumn('title', function ($data) {
                        return ($data->title);
                    })
                    ->editColumn('slug', function ($data) {
                        return ($data->slug);
                    })
                    ->editColumn('priority', function ($data) {
                        return ($data->priority);
                    })
                    ->editColumn('status', function ($data) {
                        if ($data->status == "0") {
                            return "عدم نمایش";
                        } elseif ($data->status == "4") {
                            return "در حال نمایش";
                        }
                    })
                    ->editColumn('submenu', function ($data) {
                        if ($data->submenu == 1) {
                            return "دارد";
                        } else {
                            return "ندارد";
                        }
                    })
                    ->addColumn('action', function ($data) {
                        $actionBtn = '<a href="' . route('menu-site-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('Admin.requests.all')
                ->with(compact(['menupanels' , 'submenupanels', 'menus' , 'thispage']));
        }
}
