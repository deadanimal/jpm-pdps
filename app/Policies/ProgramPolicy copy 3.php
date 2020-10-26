<?php

namespace App\Policies;

use App\User;
use App\Program;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can see the items.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAny(User $user)
    {
        // return true;
        return $user->isAgensi();
    }

    /**
     * Determine whether the user can create items.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        return $user->isAgensi() || $user->isAgensiAdmin();
    }

    /**
     * Determine whether the user can update the item.
     *
     * @param  \App\User  $user
     * @param  \App\Item  $item
     * @return boolean
     */
    public function update(User $user)
    {
        return $user->isIcuAdmin() || $user->isAgensiAdmin() || $user->isAgensi();
    }

    /**
     * Determine whether the user can delete the item.
     *
     * @param  \App\User  $user
     * @param  \App\Item  $item
     * @return boolean
     */
    public function delete(User $user)
    {
        return $user->isIcuAdmin() || $user->isAgensiAdmin();
    }
}
