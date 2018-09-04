<?php

namespace App\Services;

use App\User;
use App\MovieLike;


class UserService
{
    public function __construct() {

    }

    public function likesMovie(Movie $movie)
    {
        $movieLikes = MovieLike::where([
            'user_id' => auth()->user()->id,
            'movie_id' => $movie->id
        ]);

        return $movieLikes->count() > 0;
    }

    public function likeMovie(Movie $movie)
    {
        if(!$this->likesMovie($movie)) {
            MovieLike::create([
                'user_id' => auth()->user()->id,
                'movie_id' => $movie->id
            ]);
        }
    }

    public function unlikeMovie(Movie $movie)
    {
        if($this->likesMovie($movie)) {
            // unlike
            MovieLike::where([
                'user_id' => auth()->user()->id,
                'movie_id' => $movie->id
            ])->delete();
        }
    }
}
