<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Menu_panel;
use App\Models\Dashboard\Submenu_panel;
use App\Models\Submenu;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{

    public function index()
    {
        $countusers         = User::count();
        $users              = User::leftjoin('type_users' , 'type_users.id' , '=' , 'users.type_id')
            ->select('users.id','users.name', 'users.type_id','users.phone' , 'users.created_at' , 'type_users.title as type_title',
                DB::raw( '(CASE
            WHEN users.status = "0" THEN "غیر فعال"
            WHEN users.status = "1" THEN "ثبت نام اولیه"
            WHEN users.status = "2" THEN "تایید مدیر"
            END) AS status'))
            ->orderBy('id' , 'DESC')
            ->get();

        $menupanels     = Menu_panel::all();
        $submenupanels  = Submenu_panel::all();

//        $menupanels         = Menupanel::whereStatus(4)->get();

//        $submenupanels      = Submenupanel::whereStatus(4)->get();


        return view('Admin.panel.index')

            ->with(compact(['users' , 'menupanels' , 'submenupanels']));
    }

    private function getLastMonths($month)
    {
        for ($i = 0 ; $i < $month ; $i++) {
            $labels[] = jdate(Carbon::now()->subMonths($i-1))->format('%B');
        }

        return array_reverse($labels);
    }

    private function CheckCount($count, $month)
    {
        for ($i = 0 ; $i < $month ; $i++) {
            $new[$i] = empty($count[$i]) ? 0 : $count[$i];
        }

        return ($new);
    }

    public function getsubmenu(Request $request){
        $submenus = Submenu::whereMenu_id($request->input('id'))->get();
        $output = [];

        foreach($submenus as $submenu )
        {
            $output[$submenu->id] = $submenu->title;
        }
        return $output;
    }

}
