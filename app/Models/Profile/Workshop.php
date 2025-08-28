<?php

namespace App\Models\Profile;

use App\Models\Offer;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;
    use Sluggable;

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

    public function offer()
    {
        return $this->hasMany(Offer::class , 'workshop_id');
    }

    public function workshopsign()
    {
        return $this->hasMany(Offer::class , 'workshop_id');
    }
}
