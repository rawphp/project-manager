<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Billable;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'stripe_id',
        'card_brand',
        'card_last_four',
        'trial_ends_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'trial_ends_at',
    ];

    public function addresses()
    {
        return $this->belongsToMany(
            Address::class,
            'user_addresses',
            'user_id',
            )
            ->withPivot([
                'created_at',
                'updated_at',
                'deleted_at',
            ]);
    }

    /**
     * Retrieves the users organisations.
     *
     * @return BelongsToMany
     */
    public function organisations()
    {
        return $this->belongsToMany(
            Organisation::class,
            'staff',
            'user_id',
            )
            ->withPivot([
                'created_at',
                'updated_at',
                'deleted_at',
            ]);
    }

    /**
     * Retrieves the users roles.
     *
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles')
            ->withPivot([
                'created_at',
                'updated_at',
                'deleted_at',
            ]);
    }

//    /**
//     * Gets user permissions ids.
//     *
//     * @return array
//     */
//    public function getPermissions()
//    {
//        $permissions = [];
//
//        foreach ($this->roles as $role) {
//            $ids = $role->permissions->pluck('id');
//
////            array_map(function (Permission $permission) {
////                return $permission->id;
////            }, $role->permissions->all());
//
//            $permissions = array_merge($permissions, $ids);
//        }
//
//        return $permissions;
//    }
//
//    /**
//     * Determines whether the user has a permission.
//     *
//     * @param string $permission
//     *
//     * @return boolean
//     */
//    public function hasPermission(string $permission)
//    {
//        $found = false;
//
//        foreach ($this->roles as $role) {
//            foreach ($role->permissions as $perm) {
//                if ($perm->id === $permission) {
//                    $found = true;
//
//                    break;
//                }
//            }
//
//            if ($found) {
//                break;
//            }
//        }
//
//        return $found;
//    }
}
