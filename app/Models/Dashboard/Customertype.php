<?php

namespace App\Models\Dashboard;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customertype extends Model
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
}
