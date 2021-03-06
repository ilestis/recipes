<?php

namespace App\Generators;

use App\Planning;
use App\User;
use App\Repositories\RecipeRepository;
use App\UserSetting;
use DateTime;
use Exception;

class PlanningGenerator
{
    /**
     * @var Planning
     */
    protected $planning;

    /**
     * @var RecipeRepository
     */
    protected $recipes;

    /**
     * @var DateTime
     */
    protected $date;

    /**
     * @var bool
     */
    protected $isLunch;

    /**
     * @var DateTime
     */
    protected $maxDate;


    /**
     * PlanningGenerator constructor.
     * @param Planning $planning
     * @param RecipeRepository $recipes
     */
    public function __construct(Planning $planning, RecipeRepository $recipes){
        $this->planning = $planning;
        $this->recipes = $recipes;

        $this->date = new DateTime();
        $this->isLunch = $this->date->format('H') < 12 ? true : false;

        $this->maxDate = new DateTime();
        $this->maxDate->modify('+8 days');
    }

    /**
     * @param User $user
     */
    public function generate(User $user)
    {
        // Check upcoming meals
        $planned = $this->planning->userId($user->id)->planned()->orderBy('day', 'DESC')->orderBy('is_lunch', 'DESC')->first();


        if (!empty($planned)) {
            $plannedDate = explode('-', $planned->day);
            $this->date->setDate($plannedDate[0], $plannedDate[1], $plannedDate[2]);

            // If previous planned is in the evening, we need to push the startDate to the next day
            if ($planned->is_lunch != true) {
                $this->date->modify('+1 day');
            } else {
                $this->isLunch = false;
            }
        }

        // Track starting time
        $setting = $user->settings;
        $this->calculateNextDate($setting);

        // Now, start generating
        $months = $this->generateCurrentSeasons();
        $randomRecipes = $this->recipes->getRandomRecipesForUser($user, $months);

        // Loop through the recipes and add them
        foreach ($randomRecipes as $recipe) {
            // If the date isn't passed
            if ($this->date <= $this->maxDate) {
                $planning = $this->planning->newInstance();
                $planning->recipe_id = $recipe->id;
                $planning->user_id = $user->id;
                $planning->day = $this->date->format('Y-m-d');
                $planning->is_lunch = $this->isLunch;
                $planning->save();
            }
            

            // Update next date
            $this->calculateNextDate($setting);
        }

        if (count($randomRecipes) == 0) {
            throw new Exception('no_recipes');
        } elseif (count($randomRecipes) < 5) {
            throw new Exception('not_enough_recipes');
        }

        return true;
    }

    /**
     * @param User $user
     */
    protected function calculateNextDate(UserSetting $setting)
    {
        $newDateIsValid = false;
        while (!$newDateIsValid) {
            // Add half a day
            if ($this->isLunch === false) {
                $this->date->modify('+1 day');
                $this->isLunch = true;
            } else {
                $this->isLunch = false;
            }

            // Check if it's a meal we want to track
            $day = strtolower($this->date->format('l')) . '_' . ($this->isLunch ? 'lunch' : 'evening');

            if ($setting->$day) {
                $newDateIsValid = true;
            }
        }
    }

    /**
     * Determine what months need to be looked for
     * @return array
     */
    protected function generateCurrentSeasons()
    {
        $month = date('m');
        $months = [];

        // March to June, spring
        if ($month >= 3 and $month <= 6) {
            $months[] = 1;
        }

        // June to September, summer
        if ($month >= 6 and $month <= 9) {
            $months[] = 2;
        }

        // September to December, Autumn
        if ($month >= 9) {
            $months[] = 3;
        }

        // December to March, winter
        if ($month <= 3 || $month >= 12) {
            $months[] = 4;
        }

        return $months;
    }
}
