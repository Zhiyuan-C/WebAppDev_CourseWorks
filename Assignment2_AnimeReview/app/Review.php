<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // define the relation with animes table
    function animes(){
        return $this->belongsTo('App\Anime', 'anime_id', 'id');
    }
    // define the relation with users table
    function users(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    // define the relation with likes table
    function likes(){
        return $this->belongsToMany('App\User', 'likes', 'review_id', 'user_id');
    }
    // define the relation with dislikes table
    function dislikes(){
        return $this->belongsToMany('App\User', 'dislikes', 'review_id', 'user_id');
    }
}
