<?php

namespace App\Models\APP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class judgement extends Model
{
    use HasFactory;

    protected $fillable = [
        'judgement_type'        ,
        'contract_type'         ,
        'party_one_name'        ,
        'party_two_name'        ,
        'party_one_national_id' ,
        'party_two_national_id' ,
        'uploaded_file'         ,
        'user_id'   ,

    ];
}
