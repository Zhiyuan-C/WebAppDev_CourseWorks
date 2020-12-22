<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Anime;
use App\User;
use App\Review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    || Show the application dashboard
    **/
    public function index()
    {
        $user_id = Auth::user()->id; // current user id
        
        // get anime lists with no reviews -> Recommendation - animes
        $animes = Anime::with('reviews', 'photos')
                        ->withCount('reviews')
                        ->where('reviews_count',0)
                        ->limit(5)
                        ->get();
        
        // get anime lists with high reviews -> Recommendation - animes
        $animes_highReview = Anime::with('reviews', 'photos')
                                ->withCount('reviews')
                                ->where('reviews_count', '!=', 0)
                                ->orderBy('reviews_count', 'desc')
                                ->limit(5)
                                ->get();
        // check if user has already reviewed this anime
        $reviewed = [];
        foreach($animes_highReview as $anime){
            foreach($anime->reviews as $review){
                if($review->user_id == $user_id){
                    $reviewed[] = $review->anime_id;
                }
            }
        }
        
        // Get list of following users
        $follows = User::find($user_id)->follows()->get();
        // Get list of following users id
        $follow_id = [];
        foreach($follows as $follow){
            $follow_id[]=$follow->id;
        }
        
        // Get following users reviews
        $reviews = Review::with('likes', 'dislikes', 'animes', 'users')
                        ->whereIn('user_id', $follow_id)
                        ->withCount('likes')
                        ->withCount('dislikes')
                        ->get();
        
        // Find out who have the most followers for not following users, order from highest to lowest
        // Recommendation -> users to follow
        $recommand_users = User::with('followers')
                                ->whereNotIn('id',$follow_id)
                                ->where('id','!=', $user_id)
                                ->withCount('followers')
                                ->orderBy('followers_count', 'desc')
                                ->limit(5)
                                ->get();
                                
        //   Like and dislike, have list of voted reviews id
        // then if not in the list, user can perform like / dislike action
        $voted = [];
        $likes = Review::leftJoin('likes', 'reviews.id', '=', 'likes.review_id')
                        ->select('likes.review_id')
                        ->where('likes.user_id',$user_id)
                        ->get();
        $dislikes = Review::leftJoin('dislikes', 'reviews.id', '=', 'dislikes.review_id')
                        ->select('dislikes.review_id')
                        ->where('dislikes.user_id',$user_id)
                        ->get();
        foreach($likes as $like){
            $voted[] = $like->review_id;
        }
        foreach($dislikes as $dislike){
            $voted[] = $dislike->review_id;
        }
        
        //return the view of dashboard
        return view('home')->withAnimes($animes)->withFollows($follows)->withReviews($reviews)->with('rcmd_users', $recommand_users)->withVoted($voted)->with('animes_highReview', $animes_highReview)->withReviewed($reviewed);
    }
}
