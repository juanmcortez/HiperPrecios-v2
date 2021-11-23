<?php

namespace App\Policies\Categories;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Users\User;
use App\Models\Categories\InternalExternal;

class InternalExternalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Users\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Users\User  $user
     * @param  \App\Models\Categories\InternalExternal  $internalExternal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, InternalExternal $internalExternal)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Users\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Users\User  $user
     * @param  \App\Models\Categories\InternalExternal  $internalExternal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, InternalExternal $internalExternal)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Users\User  $user
     * @param  \App\Models\Categories\InternalExternal  $internalExternal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, InternalExternal $internalExternal)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Users\User  $user
     * @param  \App\Models\Categories\InternalExternal  $internalExternal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, InternalExternal $internalExternal)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Users\User  $user
     * @param  \App\Models\Categories\InternalExternal  $internalExternal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, InternalExternal $internalExternal)
    {
        return false;
    }
}
