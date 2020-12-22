<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Review;

class ReviewController extends Controller
{
    /**
    || Access control, only login user can perfom actions
    || For review authorisation, see AuthServiceProvider
    **/
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    || Store a newly created reviews in database.
    **/
    public function store(Request $request, $anime_id)
    {
        // Create rules for validate input
        $rules = [
            'message' => 'required',
            'user_id' => [
                Rule::unique('reviews')->where(function ($query) use($anime_id){
                    $query->where('anime_id', $anime_id);   
                }),
            ],
        ];
        
        // Customise error message
        $message = ['user_id.unique' => 'Sorry you have already reviewed this anime'];
        
        // Validate
        Validator::make($request->all(), $rules, $message)->validate();
        
        // Create new review and store in database
        $review = new Review();
        $review->rating = $request->rating;
        $review->message = $request->message;
        $review->anime_id = $anime_id;
        $review->user_id = $request->user_id;
        $review->save();
        
        // redirect back
        return back();
        
    }
    
    /**
    || Update the specified review in database.
    **/
    public function update(Request $request, $review_id)
    {
        // Authorisation: depend on the current user type, action can be performed
        $this->authorize('user_review', Review::find($review_id));
        
        // validate input
        $this->validate($request, [
            'edit_message' => 'required',
        ]);
        
        // update review
        $anime_id = $request->anime_id;
        $review = Review::find($review_id);
        $review->rating = $request->edit_rating;
        $review->message = $request->edit_message;
        $review->anime_id = $anime_id;
        $review->user_id = $request->user_id;
        $review->save();
        
        // redirect back
        return back();
    }
    
    /**
    || Remove the specified review from database.
    **/
    public function destroy(Request $request, $review_id)
    {
        // Authorisation: depend on the current user type, action can be performed
        $this->authorize('user_review', Review::find($review_id));
        
        // find review
        $review = Review::find($review_id);
        
        // detach id from likes and dislikes table
        $review->likes()->detach();
        $review->dislikes()->detach();
        
        // // delete likes and dislikes
        // $review->likes()->delete();
        // $review->dislikes()->delete();
        // delete review
        $review->delete();
        
        // redirect back
        return back();
    }
}
