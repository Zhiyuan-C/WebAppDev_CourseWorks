<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    // define the relation with studios table
    function studios(){
        return $this->belongsTo('App\Studio', 'studio_id', 'id');
    }
    // define the relation with reviews table
    function reviews(){
        return $this->hasMany('App\Review');
    }
    // define the relation with photos table
    function photos(){
        return $this->hasMany('App\Photo');
    }
}
