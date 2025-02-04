<?php

namespace App\Models\APP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class judgement extends Model
{
    use HasFactory;

    protected $fillable = [
        'judgement_type',
        'contractType',
        'partyOneName',
        'partyTwoName',
        'partyOneNationalId',
        'partyTwoNationalId',
        'uploaded_file',

    ];
}
