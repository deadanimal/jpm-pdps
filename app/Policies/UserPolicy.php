<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can see the users.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAny(User $user)
    {
        return $user->isIcuAdmin();
    }

    /**
     * Determine whether the authenticate user can create users.
     *
     * @param  \App\User $user
     * @return boolean
     */
    public function create(User $user)
    {
        return $user->isIcuAdmin();
    }

    /**
     * Determine whether the authenticate user can update the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return boolean
     */
    public function update(User $user, User $model)
    {
        return $user->isIcuAdmin();
    }

    /**
     * Determine whether the authenticate user can delete the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return boolean
     */
    public function delete(User $user, User $model)    {
        return $user->isIcuAdmin() && $user->id != $model->id;
    }

    /**
     * Determine whether the authenticate user can manage other users.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function manageUsers(User $user)
    {
        return $user->isIcuAdmin() || $user->isAgensiAdmin();
    }

    public function manageUsersAdmin(User $user)
    {
        return $user->isIcuAdmin();
    }
    
    public function manageUsersAgensi(User $user)
    {
        return $user->isAgensiAdmin();
    }

    /**
     * Determine whether the authenticate user can manage items and other related entities(tags, categories).
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function manageItems(User $user)
    {
        return $user->isIcuAdmin() || $user->isAgensiAdmin() || $user->isAgensi();
    }

    public function manageReportAdmin(User $user)
    {
        return $user->isIcuAdmin();
    }
    
    public function manageReportAgensi(User $user)
    {
        return $user->isAgensiAdmin() || $user->isAgensi();
    }
}
