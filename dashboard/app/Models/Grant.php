<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'amount',
        'grant_type',
        'grant_purpose',
        'transid', // Add this
        'dateadd', // Add this

    ];
}
