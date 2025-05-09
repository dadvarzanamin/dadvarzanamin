<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model {
    protected $fillable = ['user_id', 'balance'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactions() {
        return $this->hasMany(WalletTransaction::class);
    }

    public function deposit($amount, $description = null) {
        $this->balance += $amount;
        $this->save();

        $this->transactions()->create([
            'type' => 'deposit',
            'amount' => $amount,
            'description' => $description,
            'status' => 'completed'
        ]);
    }

    public function withdraw($amount, $description = null) {
        if ($this->balance < $amount) {
            throw new \Exception("Insufficient balance");
        }

        $this->balance -= $amount;
        $this->save();

        $this->transactions()->create([
            'type' => 'withdraw',
            'amount' => $amount,
            'description' => $description,
            'status' => 'completed'
        ]);
    }
}

