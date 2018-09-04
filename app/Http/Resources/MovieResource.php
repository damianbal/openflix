<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'genre' => $this->genre->title,
            'source' => Storage::url($this->src),
            'poster' => Storage::url($this->poster),
            'thumb' => Storage::url($this->thumb),
            'year' => 2099,
        ];
    }
}
