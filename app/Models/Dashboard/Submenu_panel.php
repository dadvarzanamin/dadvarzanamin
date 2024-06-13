<?php

namespace App\Models\Dashboard;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu_panel extends Model
{
    use HasFactory;
//    public $fillable=['title' ,'slug' ,'keycheck' ,'namayesh' ,'status' ,'description','menu_id','user_id' ];
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'label'
            ],
            'namayesh' => [
                'source' => 'label'
            ]
        ];
    }
}
