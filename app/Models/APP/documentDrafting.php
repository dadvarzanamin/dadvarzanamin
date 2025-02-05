<?php

namespace App\Models\APP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentDrafting extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic'           ,
        'sub_topic'       ,
        'document_type'   ,
        'additional_info' ,
        'uploaded_file'   ,

    ];
}
