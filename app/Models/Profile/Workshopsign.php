<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshopsign extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'workshop_id', 'typeuse', 'type_price', 'certificate', 'certif_price', 'offer_discount', 'offer_percentage', 'workshop_price', 'price', 'pricestatus', 'transactionId', 'referenceId'];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'workshop_id');
    }
}
