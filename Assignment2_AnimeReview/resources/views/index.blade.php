@extends('layouts.master')
<!-- Replace title of the page -->
@section('title')
  @if($title == 'Home')
    ANRV - Anime Review
  @else
    ANRV - {{ucfirst($title)}}
  @endif
@endsection

<!-- Active the current nav tab -->
@if(!is_null($navclass))
  @section($navclass)
    @if($navclass == 'sort')
      class="nav-link active dropdown-toggle"
    @else
      class="nav-link active"
    @endif
  @endsection
@endif

<!-- Include Jumbotron if in the home page -->
@if($title == 'Home')
  @section('homeJumb')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark no_margin">
      <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">ANRV - Anime Review</h1>
        <p class="lead my-3">Proin non ex ut lorem rutrum mollis id rutrum diam. Nullam elementum nibh in erat porta, eu consequat libero lacinia. Sed euismod sem orci, eu tincidunt ex laoreet id.</p>
      </div>
    </div>
  @endsection
@endif

@section('content')
  <!-- Display animes -->
  <div class="main_content">
    <div class="card-deck">
      @foreach($animes as $anime)
        <div class="card main_card">
          
          <!-- Photos -->
          <div class="cover_container">
            @include('section.indexPhotos')
          </div>
          
          <!-- Content -->
          <div class="card-body">
            <h5 class="card-title">{{ $anime->title }}</h5>
            <div class="row card-subtitle mb-2 text-muted no-btm-margin">
              <p class="col no_margin">Studio: {{ $anime->studio }}</p>
            </div>
            <div class="row card-subtitle mb-2 text-muted">
              <p class="col no_margin">Rating: {{ !is_null($anime->ratings_average) ? round($anime->ratings_average, 1) : '-' }}</p>
              <p class="col no_margin">Review: {{ $anime->reviews_count }}</p>
            </div>
            <div class="home_description_container"><p class="card-text home_description">{{ $anime->description }}</p></div>
            
            <a class="btn btn-dark" href="/anime/detail/{{$anime->id}}">View detail</a>
          </div> <!-- end card-body -->
        </div> <!-- end card-->
      @endforeach
    </div><!-- end card-deck -->
  </div><!-- end main_content -->
@endsection