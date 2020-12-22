<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Authentication
Auth::routes();


// AnimeController
// route for show studio
Route::get('anime/studio/{studio_id}', 'AnimeController@showStudio')->name('anime.showStudio');
// route for show
Route::get('anime/{sort}/{anime}', 'AnimeController@show')->name('anime.show');
// route for show index
Route::get('/', 'AnimeController@index')->name('index');
// rout for display edit form
Route::get('anime/detail/{anime}/edit', 'AnimeController@edit')->name('anime.edit');
// route for show rest of controller resources except index defined above
Route::resource('anime', 'AnimeController', ['except'=>['index', 'show', 'edit']]);

// ReviewController
// route for create review
Route::post('review/{anime_id}/add', 'ReviewController@store')->name('review.store');
// route for update review
Route::match(['put', 'patch'], 'review/{review_id}/edit', 'ReviewController@update')->name('review.update');
// route for delete review
Route::delete('review/{review_id}', 'ReviewController@destroy')->name('review.destroy');

// PhotoController
Route::post('photo/{anime_id}/add', 'PhotoController@store')->name('photo.store');

// LikeDislikeController
Route::post('review/like_dislike/{review_id}', 'LikeDislikeController@likeDislike')->name('likeDislike.review');

// FollowController
// route for follow user
Route::post('follow/{follow_id}', 'FollowController@follow')->name('follow.user');
// route for unfollow user
Route::post('unfollow/{following_id}', 'FollowController@unfollow')->name('unfollow.user');

// DocumentationController
Route::get('document', 'DocumentationController@show')->name('document.show');

// HomeController
Route::get('/home', 'HomeController@index')->name('home');
