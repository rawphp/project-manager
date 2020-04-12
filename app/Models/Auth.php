<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'token',
        'token_type',
        'expires_in',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
