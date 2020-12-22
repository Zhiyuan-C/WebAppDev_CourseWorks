<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    // define the relation with users table
    function users(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
