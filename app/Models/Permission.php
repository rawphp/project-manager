<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'description',
        'max_amount',
    ];

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_permissions',
        )->withPivot([
            'created_at',
            'updated_at',
        ]);
    }
}
