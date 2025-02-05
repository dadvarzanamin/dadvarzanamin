<?php

namespace App\Models\APP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lawsuit extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_type',
        'case_subject',
        'hearing_time',
        'province',
        'city',
        'court_complex',
        'court_branch',
        'additional_info',
        'uploaded_file'
    ];
}
