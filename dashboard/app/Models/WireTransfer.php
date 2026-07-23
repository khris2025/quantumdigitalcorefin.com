<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WireTransfer extends Model
{

    use HasFactory;

    protected $fillable = [
        'senders_email',
        'senders_name',
        'account_sent_from',
        'recipient_name',
        'recipient_account_number',
        'recipient_bank_name',
        'recipient_routing_number',
        'amount',
        'description',
        'transid', // Add this
        'dateadd', // Add this
    ];
}
