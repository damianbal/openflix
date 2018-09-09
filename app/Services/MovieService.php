<?php

namespace App\Services;

use App\User;
use App\MovieLike;
use App\Movie;

class MovieService
{
    /**
     * Return popular films
     *
     * @return mixed
     */
    public function getPopular()
    {
        return Movie::orderBy('views', 'DESC')->take(10)->get();
    }
}
