<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User;
use App\Planning;

class PlanningPolicy
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
     * @param Planning $planning
     * @return bool
     */
    public function update(User $user, Planning $planning)
    {
        return $user->id == $planning->user_id;
    }

    /**
     * @param User $user
     * @param Planning $planning
     * @return bool
     */
    public function destroy(User $user, Planning $planning)
    {
        return $user->id == $planning->user_id;
    }
}
