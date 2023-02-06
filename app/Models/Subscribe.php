<?php

namespace App\Models;

use Laravel\Cashier\Subscription as CashierSubscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends CashierSubscription
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'plan',
        'start_date',
        'end_date',
    ];
}
