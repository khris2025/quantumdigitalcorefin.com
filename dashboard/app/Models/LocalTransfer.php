<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalTransfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'senders_name',
        'senders_email',
        'recipient_account_number',
        'amount',
        'transfer_note',
        'transaction_type',
        'transaction_name',
        'status',
        'transid', // Add this
        'dateadd', // Add this
    ];
}
