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
}
