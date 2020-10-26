<?php

namespace App\Policies;

use App\User;
use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can see the categories.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAny(User $user)
    {
        return $user->isIcuAdmin() || $user->isAgensiAdmin();
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        return $user->isIcuAdmin() || $user->isAgensiAdmin();
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return boolean
     */
    public function update(User $user, Category $category)
    {
        return $user->isIcuAdmin() || $user->isAgensiAdmin();
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return boolean
     */
    public function delete(User $user, Category $category)
    {
        return $user->isIcuAdmin() || $user->isAgensiAdmin();
    }
}
