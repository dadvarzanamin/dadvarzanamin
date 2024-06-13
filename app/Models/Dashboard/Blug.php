<?php

namespace App\Models\Dashboard;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blug extends Model
{
    use HasFactory;
    use Sluggable;

    public function Sluggable(): array
    {
        return ['slug' => ['source' => 'title']];
    }
}
