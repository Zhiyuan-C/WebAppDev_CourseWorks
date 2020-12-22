<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class FollowController extends Controller
{
    /**
    || Access control, only login user can perfom actions
    **/
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    || Follow user and store in database.
    **/
    public function follow(Request $request, $follow_id)
    {   
        
        $user_id = Auth::user()->id; // current login user
        $follows = User::find($user_id)->follows()->attach($follow_id); // attach ids to follows
        // redirect back
        return back();
    }
    
    /**
    || Unfollow user and remove from database.
    **/
    public function unFollow(Request $request, $following_id)
    {
        $user_id = Auth::user()->id; // current login user
        $follows = User::find($user_id)->follows()->detach($following_id); // detach ids from follows
        // redirect back
        return back();
    }
}
