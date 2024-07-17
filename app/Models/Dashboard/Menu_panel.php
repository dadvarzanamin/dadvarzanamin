<?php

namespace App\Models\Dashboard;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_panel extends Model
{
    use HasFactory;
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

    //    public $fillable=['title','slug','submenu','keycheck','namayesh','keyword','status','description','user_id'];


}
