<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingAccount extends Model
{
    protected $fillable = [
        'account_name',
        'email',
        'phone',
        'balance',
    ];
}
