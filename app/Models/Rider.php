<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone',  'country', 'rider_id', 'account_id', 'subaccount_id', 'account_number', 'account_name', 'bank_code'
    ];
}
