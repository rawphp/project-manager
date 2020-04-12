<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';

    public static $intervals = [
        'DAY' => 'day',
        'WEEK' => 'week',
        'MONTH' => 'month',
        'YEAR' => 'year',
    ];

    protected $fillable = [
        'id',
        'active',
        'name',
        'amount',
        'currency',
        'interval',
        'interval_count',
        'trial_period_days',
        'statement_descriptor',
        'type',
    ];

    public function features()
    {
        return $this->belongsToMany(
            Feature::class,
            'plan_features'
        )->withPivot([
            'created_at',
            'updated_at'
        ]);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
