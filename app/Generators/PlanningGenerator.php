<?php

namespace App\Generators;

use App\Planning;
use App\User;
use App\Repositories\RecipeRepository;

class PlanningGenerator
{
    protected $planning;

    protected $recipes;

    public function __construct(Planning $planning, RecipeRepository $recipes){
        $this->planning = $planning;
        $this->recipes = $recipes;
    }

    public function generate(User $user)
    {
        // Check upcomming recipes
        $planned = $this->planning->user($user->id)->planned()->all();

        dd($planned);
    }
}