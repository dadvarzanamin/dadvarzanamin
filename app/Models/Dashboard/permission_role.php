<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission_role extends Model
{
    use HasFactory;
    public $fillable=['role_id','permission_id','user_id'];

}
