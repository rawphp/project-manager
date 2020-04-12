<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'street_1',
        'street_2',
        'city',
        'state',
        'post_code',
        'country_id',
        'created_by',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

//    public function user()
//    {
//        return $this->belongsTo(User::class, 'created_by');
//    }
}
