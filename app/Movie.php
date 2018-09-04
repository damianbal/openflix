<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
}
