<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    protected $fillable = [
        'user_id',
        'monday_lunch',
        'monday_evening',
        'tuesday_lunch',
        'tuesday_evening',
        'wednesday_lunch',
        'wednesday_evening',
        'thursday_lunch',
        'thursday_evening',
        'friday_lunch',
        'friday_evening',
        'saturday_lunch',
        'saturday_evening',
        'sunday_lunch',
        'sunday_evening',
    ] ;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
