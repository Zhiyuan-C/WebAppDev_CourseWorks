<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    // define the relation with animes table
    function animes(){
        return $this->hasMany('App\Anime');
    }
}
