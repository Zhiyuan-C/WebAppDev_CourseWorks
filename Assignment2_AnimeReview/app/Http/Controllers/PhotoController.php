<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
    || Access control, only login user can perfom actions
    **/
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
    || Store uploaded photos into database
    **/
    public function store(Request $request, $anime_id)
    {
        // validate input
        $this->validate($request, [
            'images' => 'required',
            'images.*' => 'image'
        ]);
        
        // Store each photo into database
        $files = $request->file('images');
        foreach($files as $file){
            $image = $file->store('photos', 'public');
            $photo = new Photo();
            $photo->user_id = $request->user_id;
            $photo->anime_id = $anime_id;
            $photo->photo_path = $image;
            $photo->save();
        }
        
        //redirect back
        return back();
        
    }
}
