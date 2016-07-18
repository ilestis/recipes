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
    public function getRandomRecipesForUser(User $user, array $months)
    {
        return $user->recipes()
            ->select(['recipes.*', 'p.day'])
            ->months($months)
            ->notRecent()
            ->orderByRaw("RAND()")
            ->take(10)
            ->get();
    }
}
