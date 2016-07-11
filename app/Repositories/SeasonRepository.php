<?php

namespace App\Repositories;

use App\Season;

class SeasonRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Season::all();
    }
}