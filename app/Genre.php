<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function movies()
    {
        return $this->hasMany('App\Movie', 'genre_id');
    }
}
