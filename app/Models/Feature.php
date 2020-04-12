<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'type',
        'name',
        'description',
    ];

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'plan_features');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
