<?php

namespace App\Policies\Prices;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Users\User;
use App\Models\Prices\Price;

class PricePolicy
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
     * @param  \App\Models\Prices\Price  $price
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Price $price)
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
     * @param  \App\Models\Prices\Price  $price
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Price $price)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Users\User  $user
     * @param  \App\Models\Prices\Price  $price
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Price $price)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Users\User  $user
     * @param  \App\Models\Prices\Price  $price
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Price $price)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Users\User  $user
     * @param  \App\Models\Prices\Price  $price
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Price $price)
    {
        return false;
    }
}
