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
    // App\Models\BillingAccount.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
