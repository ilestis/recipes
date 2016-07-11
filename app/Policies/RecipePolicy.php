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
    
    public function update(User $user, Recipe $recipe)
    {
        return $user->id === $recipe->user_id;
    }

    public function destroy(User $user, Recipe $recipe)
    {
        return $user->id === $recipe->user_id;
    }
}
