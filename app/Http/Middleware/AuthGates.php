<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class AuthGates
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guest()) {
            return $next($request);
        }

        $user = auth()->user();

        $roles = Role::with('permissions')->get();
        $permissions = [];

        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                if (!$permission->pivot->max_amount) {
                    $permissions[$permission->id][] = $role->id;
                } else {
                    $method = Str::plural(str_replace('_create', '', $permission->title));

                    if (!method_exists($user, $method) || $user->{$method}->count() < $permission->privot->max_amount) {
                        $permissions[$permission->id][] = $role->id;
                    }
                }
            }
        }

        foreach ($permissions as $id => $roles) {
            Gate::define(
                $id,
                function (User $user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->all(), $roles)) > 0;
                }
            );
        }

        return $next($request);
    }
}
