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
        return $query->leftJoin('plannings', 'plannings.recipe_id', '=', 'recipes.id');
    }
}
