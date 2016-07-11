<?php

namespace App\Repositories;

use App\User;

class RecipeRepository
{
    /**
     * @param User $user
     * @return mixed
     */
    public function forUser(User $user)
    {
        return $user->recipes()
            ->orderBy('created_at', 'asc')
            ->paginate(10);
    }

    /**
     * @param User $user
     */
    public function getRandomRecipesForUser(User $user)
    {
        return $user->recipes()
            ->orderByRaw("RAND()")
            ->take(10)
            ->get();
    }
}