<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Recipe extends Model
{
    //
    protected $fillable = [
        'name',
        'ingredients',
        'duration',
        'difficulty',
        'frequency',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'recipe_season');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plannings()
    {
        return $this->hasMany(Planning::class, 'recipe_id');
    }

    /**
     * @return mixed
     */
    public function getSeasonsAttribute()
    {
        return $this->seasons()->lists('season_id')->toArray();
    }

    /**
     * @return mixed
     */
    public function getDurationAttribute($value)
    {
        return substr($value, 0, 5);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeLatest($query)
    {
        return $query
            ->leftJoin('plannings', 'plannings.recipe_id', '=', 'recipes.id');
    }
    
    /**
     * @param $query
     * @param $months
     * @return mixed
     */
    public function scopeMonths($query, $months) {
        return $query
            ->join('recipe_season', 'recipes.id', '=', 'recipe_season.recipe_id')
            ->whereIn('recipe_season.season_id', $months);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNotRecent($query) {
        return $query
            ->leftJoin('plannings as p', function($subquery) {
                $subquery
                    ->on('p.recipe_id', '=', 'recipes.id')
                    ->on('p.id', '=', \DB::raw('(SELECT max(id) from plannings where recipe_id = recipes.id)'));
            })
            ->whereRaw("
                (
                    p.day is null OR 
                    (recipes.frequency = 'monthly' AND p.day <= DATE_SUB(NOW(), INTERVAL 1 MONTH)) OR 
                    (recipes.frequency = 'bi-weekly' AND p.day <= DATE_SUB(NOW(), INTERVAL 2 WEEK)) OR 
                    (recipes.frequency = 'weekly' AND p.day <= DATE_SUB(NOW(), INTERVAL 1 WEEK))
                )");
    }
}
