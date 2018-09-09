<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Resources\MovieResource;

class UserController extends Controller
{
    //
    public function liked()
    {
        $likes = auth('api')->user()->liked()->latest()->get();

        //dd($likes);

        $l = [];

        foreach($likes as $like) {

            $l[] = new MovieResource($like->movie()->first());
        }

        return ['data' => $l];
    }
}
