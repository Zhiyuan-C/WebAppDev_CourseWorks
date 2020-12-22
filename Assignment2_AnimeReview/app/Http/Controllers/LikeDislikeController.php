<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Review;

class LikeDislikeController extends Controller
{
    /**
    || Access control, only login user can perfom actions
    **/
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    || like and dislike review function
    **/
    public function likeDislike(Request $request, $review_id){
        
        // Validate input, only can be like or dislike
        $this->validate($request, [
            'type' => 'required|in:like,dislike',
        ]);
        
        // Get id of current loggin user
        $user_id = Auth::user()->id;
        
        // If user like, then attach the ids to likes, redirect back
        if($request->type == 'like'){
            $review = Review::find($review_id)->likes()->attach($user_id);
            return back();
        }
        // If user dislike, then attach the ids to dislikes, redirect back
        elseif($request->type == 'dislike'){
            $review = Review::find($review_id)->dislikes()->attach($user_id);
            return back();
        }
        // If action failed, return error page
        else{
            return view('errors.error')->withError('Ooops, loos like something went wrong');
        }
        

    }

}
