<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // define the relation with users table
    function users(){
        return $this->hasMany('App\User');
    }
}
