<?php

namespace App\Models\Profile;

use App\Models\TypeUser;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissionprofile extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'label'
            ]
        ];
    }

    public function roles(){
        return $this->belongsToMany(TypeUser::class);
    }

}
