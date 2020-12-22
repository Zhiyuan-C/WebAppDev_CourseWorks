@extends('layouts.master')
@section('title')
  ANRV - {{$anime->title}}
@endsection

@section('content')
  <div class="jumbotron anime_detail_container">
    <!-- ********** anime Detail section ********** -->
    <!-- Top row -->
    <div class="row">
      <!-- Photos -->
      <div id="carouselExampleIndicators" class="carousel slide gallery col-md-6" data-ride="carousel">
        @include('section.detailPhotos')
      </div>
   
      <!-- Anime Details -->
      <div class="col-md-6">
        <h1 class="display-4">{{$anime->title}}</h1>
        <p>Studio: {{ $anime->studio }}</p>
        <p>Broadcast since: {{ $anime->broadcast }}</p>
        <div>
          @if(is_null($anime->official_site))
            <p>official site: Not Avaliable</p>
          @else
            <p>Official site: <a href="{{ $anime->official_site }}" target="_blank">{{ $anime->official_site_name }}</a></p>
          @endif
        </div>
        <p>Overall Rating: {{ !is_null($anime->ratings_average) ? round($anime->ratings_average, 1) : '-' }}</p>
        <p>Total Reviews: {{ $anime->reviews_count }}</p>
        @can('moderator_only', Auth::user())
          <div class="detail_action_button">
            <!-- Edit anime -->
            <a class="btn btn-outline-info" href="{{route('anime.edit', ['anime'=>$anime->id])}}">Edit this Anime</a>
            <!-- Delete anime -->
            @include('form.deleteAnime')
          </div>
        @endcan
      </div>
    </div>
    <hr class="my-4">
    <!-- Second row -->
    <div class="description">
      <h5>Description</h5>
      <p class="lead">{{ $anime->description }}</p>
      
    </div>
    <hr class="my-4">
    @if (Auth::check())
      <div class="add_photos_reviews">
        <!-- Add photos -->
        <p>
          <a class="btn btn-outline-dark full_width" data-toggle="collapse" href="#collasePhoto" role="button" aria-expanded="false" aria-controls="collasePhoto">
            Add photo to gallery
          </a>
        </p>
        @include('form.addPhoto', ['action'=>'add_photo'])
        <!-- Write review -->
        <p>
          <a class="btn btn-dark full_width" data-toggle="collapse" href="#collaseReview" role="button" aria-expanded="false" aria-controls="collaseReview">
            Write a review
          </a>
        </p>
        @include('form.addReview', ['action'=>'add'])
      </div>
    @endif
    <!-- --------- End Anime Detail section -------------- -->
    
    <!-- ********** Display reviews section **********-->
    <p>See the Review of this Anime</p>
    <!--review_container-->
    <div class="review-container">
      @if($reviews->count() > 0)
        @include('section.reviews')
      @else
        No reviews yet
      @endif
    </div>
    <!-- ********** End Display reviews section ********** -->
  </div>
@endsection