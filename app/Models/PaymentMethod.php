<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'stripe_pm_id',
        'billing_name',
        'type',
        'exp_month',
        'exp_year',
        'last4',
        'country',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
