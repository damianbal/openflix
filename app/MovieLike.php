<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieLike extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function movie()
    {
        return $this->belongsTo('App\\Movie', 'movie_id');
    }

    public function user()
    {
        return $this->belongsTo('App\\User', 'user_id');
    }
}
