<?php

namespace App\Models;

use App\Models\Profile\Workshop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' , 'product_id' ,'product_type', 'product_price', 'type_use', 'type_price', 'certificate',
        'certificate_price', 'license', 'license_time', 'license_price', 'offer_discount', 'offer_percentage', 'price', 'price_status' , 'final_price'];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'product_id');
    }

}
