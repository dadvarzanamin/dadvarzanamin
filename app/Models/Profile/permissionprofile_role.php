<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissionprofile_role extends Model
{
    use HasFactory;
    public $fillable=['role_id','permission_id','user_id'];

}
