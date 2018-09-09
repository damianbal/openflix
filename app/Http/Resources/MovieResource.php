<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

use App\Services\UserService;
use App\Movie;

class MovieResource extends JsonResource
{
    protected $userService = null;


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $liked = false;

        $this->userService = app(UserService::class);

        if(auth('api')->user() != null)
        {
            if($this->userService->likesMovie(Movie::find($this->id)))
            {
                $liked = true;
            }
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'genre' => $this->genre->title,
            /*'source' => Storage::url($this->src)*/
            'source' => $this->src,
            /*'poster' => Storage::url($this->poster),*/
            /*'thumb' => Storage::url($this->thumb),*/
            'poster' => $this->poster,
            'thumb' => $this->thumb,
            'year' => 2099,
            'liked' => $liked,
            'views' => $this->views,
        ];
    }
}
