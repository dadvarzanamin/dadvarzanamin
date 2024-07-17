<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;

class SitemapController extends Controller
{
    public function generate()
    {

        $menus    = Menu::MenuSite()->get();
        $submenus = Submenu::whereStatus(4)->get();

        $sitemap = Sitemap::create();

        foreach ($menus as $menu) {
            if ($menu->submenu == 0) {

                $sitemap->add($menu->slug);

            } else {
                foreach ($submenus as $submenu) {
                    if ($menu->submenu_route == 1) {
                        if ($submenu->menu_id == $menu->id) {

                            $sitemap->add($menu->slug . '/' . $submenu->slug);

                        }
                    }
                }
            }
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return 'Sitemap generated successfully!';
    }
}
