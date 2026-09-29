<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'member_id', 
        'user_id', 
        'date_borrowed',
        'return_date', 
        'date_returned', 
        'status',
    ];
}
