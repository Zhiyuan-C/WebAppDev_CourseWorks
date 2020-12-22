<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Anime;
use App\Review;
use App\Studio;
use App\Photo;

class AnimeController extends Controller
{
    /**
    || Access control, only index, show, showStudio, create, store don't require user to login
    || For moderator only authorisation, see AuthServiceProvider
    **/
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show', 'showStudio', 'create', 'store']]);
    }
    
    /**
    || GetAnimes -> partial complete query builder to retrive animes, complete query depend on circumstances
    **/
    private function getAnimes(){ 
        $anime = Anime::with('photos', 'studios', 'reviews')
                    ->leftJoin('reviews', 'animes.id', '=', 'reviews.anime_id')
                    ->leftJoin('studios', 'animes.studio_id', '=', 'studios.id')
                    ->select('animes.*','studios.name as studio')
                    ->selectRaw('AVG(reviews.rating) as ratings_average')
                    ->withCount('reviews')
                    ->groupBy('animes.id');
        return $anime;
    }

    /**
    || Display index page -> list of animes in the database.
    **/
    public function index()
    { 
        $title = 'Home'; // display the title to the browser tab
        $nav_class = "home_class"; // to active current nav tab
        // Get all the animes from database
        $animes = $this->getAnimes()->orderBy('animes.id')->get();
        // return index page
        return view('index')->withanimes($animes)->withTitle($title)->withNavclass($nav_class);
    }

    /**
    || Show the form for creating a new anime.
    **/
    public function create()
    {
        // input fields pass to view for display
        $input_fields = array('title', 'broadcast', 'description', 'official_site', 'site_name');
        $studios = Studio::all();
        // return the view of form for create anime
        return view('form.addEditAnime')
                ->withstudios($studios)
                ->with('title', 'ANRV - Add new anime')
                ->with('action', 'add')
                ->with('input_fields', $input_fields)
                ->with('action_path', 'anime');
    }

    /**
    || Store a newly created anime in database.
    **/
    public function store(Request $request)
    {
        // validate user inputs
        $rules = [
            'title' => 'required|unique:animes,title',
            'broadcast' => 'required|date',
            'description' => 'required',
            'official_site' =>'nullable|url',
            'site_name'=>'nullable|string'
        ];
        // custom error message for not valid url
        $message = ['official_site.url' => 'Please provide a valide URL'];
        Validator::make($request->all(), $rules, $message)->validate();
        
        // Create new anime and store in database
        $anime = new Anime();
        $anime->title = $request->title;
        $anime->broadcast = $request->broadcast;
        $anime->description = $request->description;
        $anime->official_site = $request->official_site;
        $anime->official_site_name = $request->site_name;
        $anime->studio_id = $request->studio;
        $anime->save();
        
        // return detail page
        return redirect("/anime/detail/$anime->id");
    }

    /**
    || Display the specified anime detail page by access the anime id.
    **/
    public function show($type, $anime_id) 
    {
        // get details for anime, reviews and photos from database
        $anime = $this->getAnimes()->find($anime_id);
        $reviews = Review::with('users', 'likes', 'dislikes')
                    ->where("anime_id", $anime_id)
                    ->withCount('likes')
                    ->withCount('dislikes');
        $photos = Photo::with('users')
                    ->where('photos.anime_id', $anime_id)
                    ->orderBy('photos.id')
                    ->get();
                    
        // order the reviews by date or rating
        if($type == 'review_date' || $type == 'review_rating'){
            if($type == 'review_date'){
                $reviews = $reviews->orderBy('reviews.updated_at', 'desc')->paginate(5);
            }
            else {
                $reviews = $reviews->orderBy('reviews.rating', 'desc')->paginate(5);
            }
        }
        // default is sort by id
        elseif($type == 'detail'){
            $reviews = $reviews->orderBy('reviews.id')->paginate(5);
        }
        // if path not correct then show error
        else {
            return view('errors.error')->withError('Page not found');
        }
        
        // Initialise values for pass on the view to loop or check
        $rating_opt = array(1, 2, 3, 4, 5);
        $voted = [];
        $following = [];
        // get list of voted reviews id and following users id for display the vote and follow action
        // if user login, then update the lists, else list remain empty.
        if(Auth::check()){
            $user_id = Auth::user()->id;
            // get likes and dislikes id store into voted array
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
            // Get list of following users
            $follows = User::find($user_id)->follows()->get();
            // Get list of following users id
            foreach($follows as $follow){
                $following[]=$follow->id;
            }
        }
        
        // return detail page
        return view('detail')->withanime($anime)->withRating_opt($rating_opt)->withReviews($reviews)->withPhotos($photos)->with('edit', 'edit')->with('add', 'add')->withVoted($voted)->withFollowing($following);
    }
    
    /**
    || Display animes by different studios
    **/
    public function showStudio($studio_id){
        $nav_class = 'show_studio';
        $title = Studio::find($studio_id)->name;
        // get animes for the particular studio
        $animes = $this->getAnimes()->where("studio_id", $studio_id)->get();
        // return index page but only display the animes under different studios
        return view('index')->withanimes($animes)->withTitle($title)->withNavclass($nav_class);
    }

    /**
    || Show the form for editing the specified anime.
    **/
    public function edit($anime_id)
    {
        // this action only authorised for moderator user
        $this->authorize('moderator_only');
        // initialise input fields for display
        $input_fields = array('title', 'broadcast', 'description', 'official_site', 'site_name');
        $studios = Studio::all();
        $anime = $this->getAnimes()->find($anime_id);
        // return the form for edit anime
        return view('form.addEditAnime')
                ->withanime($anime)
                ->withStudios($studios)
                ->with('title', 'ANRV - Edit Anime')
                ->with('action', 'edit')
                ->with('input_fields', $input_fields)
                ->with('action_path', "anime/$anime_id");
    }

    /**
    || Update the specified anime in database.
    **/
    public function update(Request $request, $anime_id)
    {
        // this action only authorised for moderator user
        $this->authorize('moderator_only');
        
        // validate input
        $rules = [
            'title' => 'required',
            'broadcast' => 'required|date',
            'description' => 'required',
            'official_site' =>'nullable|url',
            'site_name'=>'nullable|string'
        ];
        // custom error message for not valid url
        $message = ['official_site.url' => 'Please provide a valide URL'];
        Validator::make($request->all(), $rules, $message)->validate();
        
        
        // update anime
        $anime = Anime::find($anime_id);
        $anime->title = $request->title;
        $anime->broadcast = $request->broadcast;
        $anime->description = $request->description;
        $anime->studio_id = $request->studio;
        // if offcial site or site name is not null, then update
        if(!is_null($request->official_site)){
            $anime->official_site = $request->official_site;
        }
        if(!is_null($request->site_name)){
            $anime->official_site_name = $request->site_name;
        }
        $anime->save();
        // return to detail page
        return redirect("/anime/detail/$anime_id");
    }

    /**
    || Remove the specified anime from database.
    **/
    public function destroy($anime_id)
    {
        // this action only authorised for moderator user
        $this->authorize('moderator_only');
        // find anime
        $anime = Anime::find($anime_id);
        // find review with that anime
        $reviews = Review::where('anime_id', $anime_id);
        // if the anime have reviews, then detach the likes and dislikes from that review, then delete review
        if($reviews->count() > 0){
            foreach($reviews->get() as $review){
                $review->likes()->detach();
                $review->dislikes()->detach();
            }
            $reviews->delete();
        }
        // find photos with that anime, if contains photos, then delete the photos
        $photos = photo::where('anime_id', $anime_id);
        if($photos->count() > 0){
            $photos->delete();
        }
        // delete the anime
        $anime->delete();
        // redirect back to index page
        return redirect("/");
    }
    
}
