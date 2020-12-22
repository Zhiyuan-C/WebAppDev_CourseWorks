<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','nick_name', 'dob', 'type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // define the relation with reviews table
    function reviews(){
        return $this->hasMany('App\Review');
    }
    // define the relation with photos table
    function photos(){
        return $this->hasMany('App\Photo');
    }
    // define the relation with types table
    function types(){
        return $this->belongsTo('App\Type');
    }
    // define the relation with user->follows table
    function follows(){
        return $this->belongsToMany('App\User', 'follow_user', 'user_id', 'following_id');
    }
    // define the relation with follows->user table
    function followers(){
        return $this->belongsToMany('App\User', 'follow_user', 'following_id', 'user_id');
    }
    // define the relation with likes table
    function likes(){
        return $this->belongsToMany('App\Review', 'likes', 'user_id', 'review_id');
    }
    // define the relation with dislikes table
    function dislikes(){
        return $this->belongsToMany('App\Review', 'dislikes', 'user_id', 'review_id');
    }
}
