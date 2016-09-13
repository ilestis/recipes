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
            ->planned()
            ->orderBy('day', 'ASC')
            ->orderBy('is_lunch', 'ASC')
            ->paginate(10);
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function passedForUser(User $user)
    {
        return $this->planning->userId($user->id)
            ->with('recipe')
            ->where('day', '<', date('Y-m-d'))
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