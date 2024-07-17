<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $fillable=['commentable_id' ,'commentable_type' ,'name' ,'phone' ,'parent_id' ,'approved' , 'comment'];
}
