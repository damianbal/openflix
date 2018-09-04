<?php

namespace App\Policies;

use App\User;
use App\Movie;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoviePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user->admin == true;
    }

    public function update(User $user, Movie $movie)
    {
        return $user->admin == true;
    }

    public function manage(User $user, Movie $movie)
    {
        return $user->admin == true;
    }
}
