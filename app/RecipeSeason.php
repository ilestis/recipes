<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeSeason extends Model
{
    protected $table = 'recipe_season';

    protected $fillable = [
        'recipe_id',
        'season_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
