<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'amount',
        'intrest_rate',
        'loan_term',
        'loan_purpose',
        'transid', // Add this
        'dateadd', // Add this

    ];
}
