<?php

namespace App\Models;

use App\Models\Profile\Notif;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\comment;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name','username' ,'phone' , 'phone_number','api_token' , 'address' , 'state_id' , 'type_id' , 'city_id' , 'image' ,'whatsapp' ,'instagram', 'telegram' , 'email', 'password',
    ];
    public function activeCode()
    {
        return $this->hasMany(ActiveCode::class);
    }
    public function notifs()
    {
        return $this->belongsToMany(Notif::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function isAdmin()
    {
        return $this->level == 'admin' ? true : false;
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function hasRole($role)
    {
        if(is_string($role)) {
            return $this->roles->contains('name' , $role);
        }
        return !! $role->intersect($this->roles)->count();
    }
    public function comment(){
        return $this->hasMany(comment::class);
    }

    public function commentrate(){
        return $this->hasMany(comment::class);
    }
}
