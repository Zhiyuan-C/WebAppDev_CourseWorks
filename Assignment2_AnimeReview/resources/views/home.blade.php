@extends('layouts.master')
@section('title')
  ANRV - Dashboard
@endsection
@section('content')
  <div class="container">
    <!-- Welcome message -->
    <div class="row my-3 p-3 rounded shadow-sm {{Auth::user()->type_id == 1 ? 'home_header_regular': 'home_header_moderator' }}">
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      Welcome {{Auth::user()->nick_name}}, you are logged in as a {{Auth::user()->type_id == 1 ? 'regular user' : 'moderator'}}
    </div>
    <!---------------------->
    <!-- Main dashboard content -->
    <div class="row">
      <!-- Left side bar -->
      <div class="col-md-4 {{Auth::user()->type_id == 1 ? 'home_side_nav_regular':'home_side_nav_moderator'}}">
        <div class="my-3 p-3 rounded shadow-sm">
          <!-- Recommendations -->
          <h5>Recommendations</h5>
          <!-- Recommend Users -->
          <div class="user_rcmd">
            @include('section.homeUserRcmd')
          </div>
          <!-- Recommend Animes -->
          <div class="anime_rcmd pt-3">
            @include('section.homeAnimeRcmd')
          </div>
          <!-------------------->
          <!-- Current Following list -->
          <div class="user_list pt-3">
            @include('section.homeFollowing')
          </div>
        </div>
      </div>
      
      <!-- Right bar content: reviews-->
      <div class="col-md-8 home_main_container">
        <div class="my-3 p-3 rounded shadow-sm">
          <h5>Reviews of following users</h5>
          @if($follows->count() > 0)
            @include('section.homeReviews')
          @else
            You still haven't follow any users yet
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
