<?php

namespace App\Models\APP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lawsuit extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_type'           ,
        'case_subject'        ,
        'stage'               ,
        'opponent_name'       ,
        'opponent_national_id',
        'additional_info'     ,
        'uploaded_file'       ,
        'user_id'   ,

    ];
}
