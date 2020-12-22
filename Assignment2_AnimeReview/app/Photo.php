<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // define the relation with animes table
    function animes(){
        return $this->belongsTo('App\Anime', 'anime_id', 'id');
    }
    // define the relation with users table
    function users(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
