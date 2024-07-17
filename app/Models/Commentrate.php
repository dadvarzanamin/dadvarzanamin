<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentrate extends Model
{
    use HasFactory;
    public $fillable=['commentable_id' ,'commentable_type' ,'name' ,'phone' ,'approved' ,'item1' ,'item2' ,'item3' ,'item4','item5','item6' ,  'comment'];

}
