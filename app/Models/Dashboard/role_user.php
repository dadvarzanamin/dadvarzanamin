<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{
    protected $table    = 'role_user';
    public $timestamps  = false;

    use HasFactory;

    public $fillable=['role_id' , 'user_id'];

}
