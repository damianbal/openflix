<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Http\Resources\MovieResource;
use App\Genre;
use App\Services\UserService;
use App\Services\MovieService;

class MovieController extends Controller
{
    protected $userService = null;
    protected $movieService = null;

    public function __construct(UserService $userService, MovieService $movieService)
    {
        $this->userService = $userService;
        $this->movieService = $movieService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $genre = $request->input('genre', null);
        $sort  = $request->input('sort', null);

        $movies = Movie::latest()->paginate(8);

        if ($genre != null || strlen($genre) >= 1 || intval($genre) > 0) {
            $g = Genre::find($genre);

            $movies = $g->movies()->latest()->paginate(8);
            return MovieResource::collection($movies);
        }

        return MovieResource::collection($movies);
    }

    public function popular()
    {
        return MovieResource::collection($this->movieService->getPopular());
    }

    public function like(Movie $movie)
    {
        $this->userService->likeMovie($movie);
        return [];
    }

    public function unlike(Movie $movie)
    {
        $this->userService->unlikeMovie($movie);
        return [];
    }
}
