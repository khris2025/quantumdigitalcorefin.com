<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $casts = [
        'dateadd' => 'date',
    ];

    protected $fillable = [
        'fullname',
        'email',
        'account',
        'amount',
        'transaction_type',
        'transaction_name',
        'status',
        'transaction_id',
        'wallet_address',
        'dateadd', // Add this
    ];

}
