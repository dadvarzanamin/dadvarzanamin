<?php

namespace App\Models\APP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tokil extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_type'    ,
        'hearing_date' ,
        'hearing_time' ,
        'province'     ,
        'city'         ,
        'court_complex',
        'court_branch' ,

    ];
}
