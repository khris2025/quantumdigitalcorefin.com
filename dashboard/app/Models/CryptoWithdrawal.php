<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoWithdrawal extends Model
{
     protected $fillable = [
        'users_name',
        'users_email',
        'amount',
        'coin_type',
        'wallet_address',
        'transid', // Add this
        'dateadd', // Add this

    ];
    use HasFactory;
}
