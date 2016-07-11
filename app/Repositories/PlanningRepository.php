<?php

namespace App\Repositories;

use App\User;
use App\Planning;

class PlanningRepository
{
    /**
     * @var Planning
     */
    protected $planning;

    /**
     * PlanningRepository constructor.
     * @param Planning $planning
     */
    public function __construct(Planning $planning)
    {
        $this->planning = $planning;
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function forUser(User $user)
    {
        return $this->planning->userId($user->id)
            ->with('recipe')
            ->orderBy('day', 'DESC')
            ->orderBy('is_lunch', 'DESC')
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