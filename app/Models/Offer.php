<?php

namespace App\Models;

use App\Models\Profile\Workshop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}
