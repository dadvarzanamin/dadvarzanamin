<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\APP\tokil;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TokilController extends Controller
{
    public function index(Request $request)
    {
        $thispage       = [
            'title'         => 'مدیریت ',
            'list_title'    => 'لیست ',
            'add_title'     => 'افزودن ',
            'create_title'  => 'ایجاد ',
            'enter_title'   => 'ورود اطلاعات ',
        ];
        $menus          = Menu::all();
        $menupanels     = Menu_panel::whereStatus(4)->get();
        $submenupanels  = Submenu_panel::whereStatus(4)->get();

        if ($request->ajax()) {
            $data = tokil::all();
            return Datatables::of($data)
                ->editColumn('case_type', function ($data) {
                    return ($data->case_type);
                })
                ->editColumn('hearing_date', function ($data) {
                    return ($data->hearing_date);
                })
                ->editColumn('court_complex', function ($data) {
                    return ($data->court_complex);
                })
                ->editColumn('court_branch', function ($data) {
                    return ($data->court_branch);
                })
                ->editColumn('additional_info', function ($data) {
                    return ($data->additional_info);
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('menu-site-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.tokil.all')
            ->with(compact(['menupanels' , 'submenupanels', 'menus' , 'thispage']));
    }

}
