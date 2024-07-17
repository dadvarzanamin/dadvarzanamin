<?php

namespace App\Models\Profile;

use App\Models\Dashboard\notif_user;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function notif_user()
    {
        return $this->belongsToMany(notif_user::class, 'notif_user');
    }
}
