<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param User $user
     */
    public function created(User $user)
    {
        if ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
        }
    }

    /**
     * Handle the user "updated" event.
     *
     * @param User $user
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param User $user
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param User $user
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param User $user
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
