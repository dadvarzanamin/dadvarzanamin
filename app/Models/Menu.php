<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Menu extends Model
{
    use HasFactory;
    use Sluggable;

    public function ScopeMenuSite($query){
        $query->where('menus.status', 4);
        $query->where('menus.level', 'site');
    }
    public function ScopeMenuDashboard($query){
        $query->where('menus.status', 4);
        $query->where('menus.level', 'dashboard');
        if (Auth::user()->level != 'admin'){
            $query->whereJsonContains('menus.userlevel', (string)Auth::user()->type_id);
        }
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => $this->shouldSlug()
            ]
        ];
    }
    protected function shouldSlug()
    {
        return $this->id != 1;
    }

}
