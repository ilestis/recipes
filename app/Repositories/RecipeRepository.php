<?php

namespace App\Repositories;

use App\User;

class RecipeRepository
{
    public function forUser(User $user)
    {
        return $user->recipes()
            ->orderBy('created_at', 'asc')
            ->get();
    }
}