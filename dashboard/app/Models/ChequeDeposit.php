<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequeDeposit extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'amount',
        'proof',
        'note',
        'status',
        'transid',
        'dateadd',
    ];
}
