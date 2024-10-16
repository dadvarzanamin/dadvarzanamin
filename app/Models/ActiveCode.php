<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ActiveCode extends Model
{

    protected $fillable = [
        'user_id',
        'code',
        'expired_at'
    ];

    public $timestamps = false;

    public static function generateCode($user)
    {
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeVerifyCode($query , $code,  $user)
    {
        return !! $user->activeCode()->whereCode($code)->where('expired_at' , '>' , now())->first();
    }

    public function scopeGenerateCode($query , $user)
    {
        $user->activeCode()->delete();
//        if($code = $this->getAliveCodeForUser($user)) {
//            $code = $code->code;
//        } else {
//
//        }

       // $user->ActiveCode()->delete();

        do {
            $code = mt_rand(100000, 999999);
        } while($this->checkCodeIsUnique($user , $code));

        // store the code
        $user->activeCode()->create([
            'code' => $code,
            'expired_at' => now()->addMinutes(3)
        ]);

        return $code;
    }

    private function checkCodeIsUnique($user, int $code)
    {
        return !! $user->ActiveCode()->whereCode($code)->first();
    }

    private function getAliveCodeForUser($user)
    {
        return $user->activeCode()->where('expired_at' , '>' , now())->first();
    }
}

