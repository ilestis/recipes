<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Planning extends Model
{
    //
    protected $fillable = [
        'user_id',
        'recipe_id',
        'day',
        'is_lunch'
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $query
     * @param $userId
     * @return mixed
     */
    public function scopeUserId($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopePlanned($query)
    {
        return $query->whereRaw('DATE(day) >= ' . date('Y-m-d'));
    }

    /**
     * @return string
     */
    public function getFormattedDay()
    {
        $date = new DateTime($this->day);
        return $date->format('l jS \of F Y');
    }
}
