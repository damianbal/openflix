<?php

namespace App\Services;

use App\User;
use App\MovieLike;
use App\Movie;

class UserService
{
    public function __construct() {

    }

    public function getLikedMovies(User $user)
    {
        $likes = $user->liked()->get();

        $l = [];

        foreach($likes as $like) {
            $l[] = $like->movie()->first();
        }

        return $l;
    }

    public function likesMovie(Movie $movie)
    {
        $movieLikes = MovieLike::where([
            'user_id' => auth('api')->user()->id,
            'movie_id' => $movie->id
        ]);

        return $movieLikes->count() > 0;
    }

    public function likeMovie(Movie $movie)
    {
        if(!$this->likesMovie($movie)) {
            return MovieLike::create([
                'user_id' => auth('api')->user()->id,
                'movie_id' => $movie->id
            ]);
        }
    }

    public function unlikeMovie(Movie $movie)
    {
        if($this->likesMovie($movie)) {
            // unlike
            MovieLike::where([
                'user_id' => auth('api')->user('api')->id,
                'movie_id' => $movie->id
            ])->delete();
        }
    }
}
