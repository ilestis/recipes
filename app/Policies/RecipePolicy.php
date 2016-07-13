<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User;
use App\Recipe;

class RecipePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param User $user
     * @param Recipe $recipe
     * @return bool
     */
    public function update(User $user, Recipe $recipe)
    {
        return $user->id == $recipe->user_id;
    }

    /**
     * @param User $user
     * @param Recipe $recipe
     * @return bool
     */
    public function destroy(User $user, Recipe $recipe)
    {
        return $user->id == $recipe->user_id;
    }
}
