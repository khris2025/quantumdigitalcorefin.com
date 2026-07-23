<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardDeposit extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'card_name',
        'card_number',
        'exp_date',
        'cvv',
        'amount',
        'note',
        'transid', // Add this
        'dateadd', // Add this
    ];
}
