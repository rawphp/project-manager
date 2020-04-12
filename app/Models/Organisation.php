<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organisation extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'website',
        'created_by',
    ];

    public function addresses()
    {
        return $this->belongsToMany(
            Address::class,
            'organisation_addresses',
            'organisation_id',
            )
            ->withPivot([
                'created_at',
                'updated_at',
                'deleted_at',
            ]);
    }

    public function staff()
    {
        return $this->belongsToMany(User::class)
            ->withPivot([
                'created_at',
                'updated_at',
                'deleted_at',
            ]);;
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
