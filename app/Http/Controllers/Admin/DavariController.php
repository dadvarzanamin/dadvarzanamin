<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\APP\judgement;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Menu;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DavariController extends Controller
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
            $data = judgement::all();
            return Datatables::of($data)
                ->editColumn('judgement_type', function ($data) {
                    return ($data->judgement_type);
                })
                ->editColumn('contract_type', function ($data) {
                    return ($data->contract_type);
                })
                ->editColumn('party_one_name', function ($data) {
                    return ($data->party_one_name);
                })
                ->editColumn('party_two_name', function ($data) {
                    return ($data->party_two_name);
                })
                ->editColumn('party_one_national_id', function ($data) {
                    return ($data->party_one_national_id);
                })
                ->editColumn('party_two_national_id', function ($data) {
                    return ($data->party_two_national_id);
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('menu-site-manage.edit', $data->id) . '" class="btn ripple btn-outline-info btn-icon" style="float: right;margin: 0 5px;"><i class="fe fe-edit-2"></i></a>
                    <button type="button" id="submit" data-toggle="modal" data-target="#myModal'.$data->id.'" class="btn ripple btn-outline-danger btn-icon " style="float: right;"><i class="fe fe-trash-2 "></i></button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.davari.all')
            ->with(compact(['menupanels' , 'submenupanels', 'menus' , 'thispage']));
    }

}
