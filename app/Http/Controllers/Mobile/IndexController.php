<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Site\ValidationException;
use App\Models\Akhbar;
use App\Models\Company;
use App\Models\Consultation;
use App\Models\Dashboard\Blug;
use App\Models\Dashboard\Customer;
use App\Models\Dashboard\Portfolio;
use App\Models\Dashboard\Post;
use App\Models\Dashboard\Questionlist;
use App\Models\Dashboard\Slide;
use App\Models\Emploee;
use App\Models\mega_menu;
use App\Models\Menu;
use App\Models\Profile\Workshop;
use App\Models\Submenu;
use DeviceDetector\DeviceDetector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function demo(){

        //$receiverEmail = 'hosseindbk@yahoo.com';
       // Mail::to($receiverEmail)->send(new VerificationEmail());
        //return "ایمیل تستی با موفقیت ارسال شد!";
        // Artisan::call('storage:link');
         return view('Demo.index');
    }

    public function index(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }
        $megacounts = mega_menu::selectRaw('COUNT(*) as count, menu_id')
            ->groupBy('menu_id')
            ->get()
            ->toArray();
        $megamenus = mega_menu::all();
        $submenus = Submenu::select('id', 'title', 'slug', 'image' , 'menu_id','description', 'megamenu_id')->whereStatus(4)->get();
        $companies      = Company::first();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image','description', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $serviceclients = Submenu::select('title', 'slug', 'menu_id', 'image', 'description', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(5)->whereMenu_id(64)->get();
        $slides = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->get();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->whereHome_show(1)->orderBy('id' , 'DESC')->limit(6)->get();
        $emploees       = Emploee::whereStatus(4)->orderBy('priority')->get();
        $akhbars        = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.updated_at')->where('akhbars.status', 4)->where('akhbars.home_show', 1)->get();
        $workshops      = Workshop::whereStatus(4)->first();


        $userAgent = request()->header('User-Agent');

        $deviceDetector = new DeviceDetector($userAgent);
        $deviceDetector->parse();
        $lastmenuid = null;
        if ($deviceDetector->isMobile()) {
            return view('mobile.index')->with(compact('menus','lastmenuid' ,'posts' , 'workshops' ,  'thispage', 'companies', 'slides', 'customers', 'submenus', 'servicelawyers', 'serviceclients', 'akhbars', 'megamenus', 'megacounts', 'emploees'));
        }else {
            return view('Site.index')->with(compact('menus', 'thispage' ,'posts', 'companies' , 'workshops' , 'slides', 'customers', 'submenus', 'servicelawyers', 'serviceclients', 'akhbars', 'megamenus', 'megacounts', 'emploees'));
        }
    }

    public function about(Request $request){
        $url = $request->segments();
        $menus        = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority' , 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }
        $megacounts = mega_menu::selectRaw('COUNT(*) as count, menu_id')
            ->groupBy('menu_id')
            ->get()
            ->toArray();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $megamenus          = mega_menu::all();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id' , 'megamenu_id')->whereStatus(4)->get();
        $companies          = Company::first();
        $services           = Submenu::select('title' , 'slug' , 'menu_id' , 'image')->whereStatus(4)->whereMenu_id(64)->get();
        $slides             = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $emploees           = Emploee::whereStatus(4)->orderBy('priority')->get();
        $customers          = Customer::select('name' , 'image')->whereStatus(4)->whereHome_show(1)->get();
        return view('Site.about')
            ->with(compact('menus','thispage' , 'companies' ,'emploees' , 'slides' , 'customers' , 'submenus' , 'services' , 'megacounts' , 'megamenus', 'servicelawyers'));
    }

    public function questionlist(Request $request){
        $url = $request->segments();
        $menus        = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority' , 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $megacounts         = mega_menu::selectRaw('COUNT(*) as count, menu_id')->groupBy('menu_id')->get()->toArray();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id' , 'megamenu_id')->whereStatus(4)->get();
        $submenuquestions   = Submenu::select('id' , 'title')->whereStatus(4)->where('menu_id' ,'!=' , 65)->get();
        $services           = Submenu::select('title' , 'slug' , 'menu_id' , 'image')->whereStatus(4)->whereMenu_id(64)->get();
        $slides             = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers          = Customer::select('name' , 'image')->whereStatus(4)->whereHome_show(1)->get();
        $questionlists      = Questionlist::Filter()->paginate(25);
        $megamenus          = mega_menu::all();
        $companies          = Company::first();

        if ($request->ajax()) {
            return response()->json(['data' => $questionlists]);
        }

        return view('Site.questionlist')
            ->with(compact('menus','thispage' , 'companies' , 'slides' , 'customers' , 'submenus' , 'services' , 'megacounts' , 'megamenus' , 'questionlists' , 'submenuquestions', 'servicelawyers'));
    }

    public function akhbar(Request $request)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }
        $megacounts = mega_menu::selectRaw('COUNT(*) as count, menu_id')
            ->groupBy('menu_id')
            ->get()
            ->toArray();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $megamenus = mega_menu::all();
        $submenus = Submenu::select('title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();
        $companies = Company::first();
        $services = Submenu::select('title', 'slug', 'menu_id', 'image')->whereStatus(4)->whereMenu_id(64)->get();
        $slides = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $akhbars = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.slug', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.updated_at')->where('akhbars.status', 4)->get();

        $userAgent = request()->header('User-Agent');

        $deviceDetector = new DeviceDetector($userAgent);
        $deviceDetector->parse();

        if ($deviceDetector->isMobile()) {
            return view('mobile.blog')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'services', 'megacounts', 'megamenus', 'akhbars', 'servicelawyers'));
        }else{
            return view('Site.akhbar')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'services', 'megacounts', 'megamenus', 'akhbars', 'servicelawyers'));

        }
    }

    public function singleakhbar(Request $request , $slug)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } else {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug('اخبار')->first();
        }
        $megacounts = mega_menu::selectRaw('COUNT(*) as count, menu_id')
            ->groupBy('menu_id')
            ->get()
            ->toArray();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $megamenus = mega_menu::all();
        $submenus = Submenu::select('title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();
        $companies = Company::first();
        $services = Submenu::select('title', 'slug', 'menu_id', 'image')->whereStatus(4)->whereMenu_id(64)->get();
        $slides = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $akhbars = Akhbar::leftjoin('users', 'akhbars.user_id', '=', 'users.id')->
        select('akhbars.title', 'akhbars.image', 'akhbars.description', 'users.name as username', 'akhbars.updated_at', 'akhbars.keyword')->where('akhbars.status', 4)->where('akhbars.slug', $slug)->first();
        $userAgent = request()->header('User-Agent');

        $deviceDetector = new DeviceDetector($userAgent);
        $deviceDetector->parse();

        if ($deviceDetector->isMobile()) {
            return view('mobile.blog-single')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'services', 'megacounts', 'megamenus', 'akhbars', 'servicelawyers'));
        }else{
            return view('Site.singleakhbar')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'services', 'megacounts', 'megamenus', 'akhbars', 'servicelawyers'));
        }
    }

    public function contact(Request $request){
        $url = $request->segments();
        $menus        = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority' , 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }
        $megacounts = mega_menu::selectRaw('COUNT(*) as count, menu_id')
            ->groupBy('menu_id')
            ->get()
            ->toArray();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $megamenus          = mega_menu::all();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id' , 'megamenu_id')->whereStatus(4)->get();
        $companies          = Company::first();
        $services           = Submenu::select('title' , 'slug' , 'menu_id' , 'image')->whereStatus(4)->whereMenu_id(64)->get();
        $slides             = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers          = Customer::select('name' , 'image')->whereStatus(4)->whereHome_show(1)->get();
        return view('Site.contact')
            ->with(compact('menus','thispage' , 'companies' , 'slides' , 'customers' , 'submenus' , 'services' , 'megacounts' , 'megamenus' , 'servicelawyers'));
    }

    public function customer(){
        $menus              = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority')->MenuSite()->orderBy('priority')->get();
        $logos              = Company::select('title' , 'file_link')->first();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id')->whereStatus(4)->get();
        $slides             = Slide::select('title1' , 'file_link')->whereMenu_id(7)->whereStatus(4)->first();
        $customers          = Customer::whereStatus(4)->orderBy('priority')->get();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();

        return view('Site.customer')
            ->with(compact('menus'))
            ->with(compact('customers'))
            ->with(compact('logos'))
            ->with(compact('slides'))
            ->with(compact('submenus'))
            ->with(compact('servicelawyers'));
    }

    public function departmandaavi(Request $request){
        $url = $request->segments();
        $menus        = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority' , 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }
        $megacounts = mega_menu::selectRaw('COUNT(*) as count, menu_id')
            ->groupBy('menu_id')
            ->get()
            ->toArray();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $megamenus          = mega_menu::all();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id' , 'megamenu_id' )->whereStatus(4)->get();
        $companies          = Company::first();
        $services           = Submenu::select('title' , 'slug' , 'menu_id' , 'image', 'keyword', 'description')->whereSlug($url[1])->first();
        $slides             = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers          = Customer::select('name' , 'image')->whereStatus(4)->whereHome_show(1)->get();

        $userAgent = request()->header('User-Agent');
        $deviceDetector = new DeviceDetector($userAgent);
        $deviceDetector->parse();
        $lastmenuid = null;
        if ($deviceDetector->isMobile()) {
            return view('mobile.service-single')->with(compact('menus','thispage' , 'companies' , 'slides' , 'customers' , 'submenus' , 'services' , 'megacounts' , 'megamenus' , 'servicelawyers'));
        } else {
            return view('Site.singleservice')->with(compact('menus','thispage' , 'companies' , 'slides' , 'customers' , 'submenus' , 'services' , 'megacounts' , 'megamenus' , 'servicelawyers'));
        }
    }

    public function departmanamoozesh(Request $request){
        $url = $request->segments();
        $menus        = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority' , 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }
        $megacounts = mega_menu::selectRaw('COUNT(*) as count, menu_id')
            ->groupBy('menu_id')
            ->get()
            ->toArray();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $megamenus          = mega_menu::all();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id' , 'megamenu_id')->whereStatus(4)->get();
        $companies          = Company::first();
        $services           = Submenu::select('title' , 'slug' , 'menu_id' , 'image')->whereSlug($url[1])->first();
        $slides             = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers          = Customer::select('name' , 'image')->whereStatus(4)->whereHome_show(1)->get();

        $userAgent = request()->header('User-Agent');
        $deviceDetector = new DeviceDetector($userAgent);
        $deviceDetector->parse();
        $lastmenuid = null;
        if ($deviceDetector->isMobile()) {
            return view('mobile.service-single')->with(compact('menus','thispage' , 'companies' , 'slides' , 'customers' , 'submenus' , 'services' , 'megacounts' , 'megamenus' , 'servicelawyers'));
        } else {
            return view('Site.singleservice')->with(compact('menus','thispage' , 'companies' , 'slides' , 'customers' , 'submenus' , 'services' , 'megacounts' , 'megamenus' , 'servicelawyers'));
        }
    }

    public function departmangharardad(Request $request){
        $url = $request->segments();
        $menus        = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority' , 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }
        $megacounts = mega_menu::selectRaw('COUNT(*) as count, menu_id')
            ->groupBy('menu_id')
            ->get()
            ->toArray();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $megamenus          = mega_menu::all();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id' , 'megamenu_id')->whereStatus(4)->get();
        $companies          = Company::first();
        $services           = Submenu::select('title' , 'slug' , 'menu_id' , 'image' , 'description')->whereSlug($url[1])->first();
        $slides             = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers          = Customer::select('name' , 'image')->whereStatus(4)->whereHome_show(1)->get();

        $userAgent = request()->header('User-Agent');
        $deviceDetector = new DeviceDetector($userAgent);
        $deviceDetector->parse();
        $lastmenuid = null;
        if ($deviceDetector->isMobile()) {
            return view('mobile.service-single')->with(compact('menus','thispage' , 'companies' , 'slides' , 'customers' , 'submenus' , 'services' , 'megacounts' , 'megamenus' , 'servicelawyers'));
        } else {
            return view('Site.singleservice')->with(compact('menus','thispage' , 'companies' , 'slides' , 'customers' , 'submenus' , 'services' , 'megacounts' , 'megamenus' , 'servicelawyers'));
        }
    }

    public function service(Request $request){
        $url = $request->segments();
        $menus        = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority' , 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }
        $megacounts = mega_menu::selectRaw('COUNT(*) as count, menu_id')
            ->groupBy('menu_id')
            ->get()
            ->toArray();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $megamenus          = mega_menu::all();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id' , 'megamenu_id')->whereStatus(4)->get();
        $companies          = Company::first();
        $services           = Submenu::select('title' , 'slug' , 'menu_id' , 'image' , 'description' , 'keyword')->whereSlug($url[1])->first();
        $slides             = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers          = Customer::select('name' , 'image')->whereStatus(4)->whereHome_show(1)->get();

        $userAgent = request()->header('User-Agent');
        $deviceDetector = new DeviceDetector($userAgent);
        $deviceDetector->parse();
        $lastmenuid = null;
        if ($deviceDetector->isMobile()) {
            return view('mobile.service-single')->with(compact('menus','thispage' , 'companies' , 'slides' , 'customers' , 'submenus' , 'services' , 'megacounts' , 'megamenus' , 'servicelawyers'));
        } else {
            return view('Site.singleservice')->with(compact('menus','thispage' , 'companies' , 'slides' , 'customers' , 'submenus' , 'services' , 'megacounts' , 'megamenus' , 'servicelawyers'));
        }

    }

    public function Consultationrequest(Request $request){
        try {
            $request->validate([
                'name'      => 'required',
                'phone'     => 'required',
                'submenu_'  => 'required',
                'captcha'   => 'required|captcha'
            ]);

            $consultations = new Consultation();
            $consultations->name        = $request->input('name');
            $consultations->phone       = $request->input('phone');
            $consultations->submenu     = $request->input('submenu_');
            $consultations->description = $request->input('description');

            $result = $consultations->save();
            if ($result == true) {
                $success = true;
                $flag = 'success';
                $subject = 'ارسال موفق';
                $message = 'پیام شما با موفقیت ثبت شد';
            } else {
                $success = false;
                $flag = 'error';
                $subject = 'عملیات نا موفق';
                $message = 'پیام ثبت نشد، لطفا مجددا تلاش نمایید';
            }
            return response()->json(['success' => $success, 'subject' => $subject, 'flag' => $flag, 'message' => $message]);

        }catch (ValidationException  $e) {
            $success = false;
            $flag = 'error';
            $subject = 'خطا در ارتباط با سرور';
            //$message = strchr($e);
            $message = 'اطلاعات ثبت نشد،لطفا بعدا مجدد تلاش نمایید ';
            return response()->json(['errors' => $e->errors()], 422);

        }

    }
    public function post(Request $request)
    {
        $url = $request->segments();
        $menus        = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority' , 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug('/')->first();
        }
        $megacounts = mega_menu::selectRaw('COUNT(*) as count, menu_id')
            ->groupBy('menu_id')
            ->get()
            ->toArray();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $megamenus          = mega_menu::all();
        $submenus           = Submenu::select('title' , 'slug' , 'menu_id' , 'megamenu_id')->whereStatus(4)->get();
        $companies          = Company::first();
        $services           = Submenu::select('title' , 'slug' , 'menu_id' , 'image', 'keyword', 'description')->whereSlug($url[1])->first();
        $slides             = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers          = Customer::select('name' , 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::whereStatus(4)->get();

        return view('Site.posts')->with(compact('menus','thispage' , 'companies' , 'slides' , 'customers' ,'posts' ,  'submenus' , 'services' , 'megacounts' , 'megamenus' , 'servicelawyers'));

    }

    public function singlepost(Request $request , $slug)
    {
        $url = $request->segments();
        $menus = Menu::select('id', 'title', 'slug', 'submenu', 'priority', 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->MenuSite()->whereSlug($url[0])->first();
        } else {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description')->whereSlug('اخبار')->first();
        }
        $megacounts = mega_menu::selectRaw('COUNT(*) as count, menu_id')
            ->groupBy('menu_id')
            ->get()
            ->toArray();
        $megamenus      = mega_menu::all();
        $companies      = Company::first();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $submenus       = Submenu::select('title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();
        $services       = Submenu::select('title', 'slug', 'menu_id', 'image')->whereStatus(4)->whereMenu_id(64)->get();
        $slides         = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        $customers      = Customer::select('name', 'image')->whereStatus(4)->whereHome_show(1)->get();
        $posts          = Post::leftjoin('users', 'posts.user_id', '=', 'posts.id')->
        select('posts.title', 'posts.image', 'posts.description', 'posts.file' ,'posts.aparat' ,  'users.name as username', 'posts.updated_at', 'posts.keyword')->where('posts.status', 4)->where('posts.slug', $slug)->first();

        return view('Site.singleposts')->with(compact('menus', 'thispage', 'companies', 'slides', 'customers', 'submenus', 'services', 'megacounts', 'megamenus', 'posts', 'servicelawyers'));
    }
    public function term(Request $request)
    {
        $url = $request->segments();
        $menus        = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority' , 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description' , 'description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description' , 'description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description' , 'description')->MenuSite()->whereSlug('/')->first();
        }
        $megacounts = mega_menu::selectRaw('COUNT(*) as count, menu_id')
            ->groupBy('menu_id')
            ->get()
            ->toArray();
        $megamenus      = mega_menu::all();
        $companies      = Company::first();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $submenus       = Submenu::select('title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();
        $services       = Submenu::select('title', 'slug', 'menu_id', 'image')->whereStatus(4)->whereMenu_id(64)->get();
        $slides         = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        return view('Site.term')->with(compact('menus', 'thispage', 'companies', 'slides', 'submenus', 'services', 'megacounts', 'megamenus', 'servicelawyers'));
    }
    public function privacy(Request $request)
    {
        $url = $request->segments();
        $menus        = Menu::select('id' , 'title' , 'slug' , 'submenu' , 'priority' , 'mega_menu')->MenuSite()->orderBy('priority')->get();
        if (count($url) == 1) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description' , 'description')->MenuSite()->whereSlug($url[0])->first();
        } elseif (count($url) > 1) {
            $thispage = Submenu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description' , 'description')->whereSlug($url[1])->first();
        }elseif (count($url) == 0) {
            $thispage = Menu::select('id', 'title', 'slug', 'tab_title', 'page_title', 'keyword', 'page_description' , 'description')->MenuSite()->whereSlug('/')->first();
        }
        $megacounts = mega_menu::selectRaw('COUNT(*) as count, menu_id')
            ->groupBy('menu_id')
            ->get()
            ->toArray();
        $megamenus      = mega_menu::all();
        $companies      = Company::first();
        $servicelawyers = Submenu::select('title', 'slug', 'menu_id', 'image', 'megamenu_id')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
        $submenus       = Submenu::select('title', 'slug', 'menu_id', 'megamenu_id')->whereStatus(4)->get();
        $services       = Submenu::select('title', 'slug', 'menu_id', 'image')->whereStatus(4)->whereMenu_id(64)->get();
        $slides         = Slide::select('id', 'file_link')->whereMenu_id($thispage['id'])->whereStatus(4)->first();
        return view('Site.privacy')->with(compact('menus', 'thispage', 'companies', 'slides', 'submenus', 'services', 'megacounts', 'megamenus', 'servicelawyers'));
    }
    public function reloadCaptcha(){
        return response()->json(['captcha'=> captcha_img('math')]);
    }

    public function getcategory(Request $request){

            if($request->input('id') == 1) {
                $servicelawyers = Submenu::select('id','title')->whereStatus(4)->whereMegamenu_id(4)->whereMenu_id(64)->get();
            }elseif($request->input('id') == 2) {
                $servicelawyers = Submenu::select('id','title')->whereStatus(4)->whereMegamenu_id(5)->whereMenu_id(64)->get();
            }

        $output = [];

        foreach($servicelawyers as $servicelawyer )
        {
            $output[$servicelawyer->id] = $servicelawyer->title;
        }

        return $output;
    }

}
