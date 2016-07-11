<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    //
    protected $fillable = [
        'name',
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_season');
    }
    
}
