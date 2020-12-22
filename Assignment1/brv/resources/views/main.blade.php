@extends('layouts.master')
<!-- Replace title of the page -->
@section('title')
  @if($title == 'Home')
    BRV - Book Review
  @else
    BRV - {{ucfirst($title)}}
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
        <h1 class="display-4 font-italic">BRV - Book Review</h1>
        <p class="lead my-3">Proin non ex ut lorem rutrum mollis id rutrum diam. Nullam elementum nibh in erat porta, eu consequat libero lacinia. Sed euismod sem orci, eu tincidunt ex laoreet id.</p>
      </div>
    </div>
  @endsection
@endif

@section('content')
  <!-- Display books -->
  <div class="main_content">
    @if($title == 'search')
      <h4>Search result:</h4>
    @elseif($navclass == 'sort' )
      <h4>{{ $title }}: </h4>
    @endif
    <div class="card-deck">
      @foreach($books as $book)
        <div class="card main_card">
          <div class="cover_container">
            <div class="cover">
              <img class="card-img-top cover_img" src="{{secure_asset("$book->cover")}}" alt="Book cover">
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <div class="row card-subtitle mb-2 text-muted no-btm-margin">
              <p class="col no_margin">Category: {{ $book->category }}</p>
            </div>
            <div class="row card-subtitle mb-2 text-muted">
              <p class="col no_margin">Rating: {{ !is_null($book->rating) ? round($book->rating, 1) : '-' }}</p>
              <p class="col no_margin">Review: {{ $book->rev_num }}</p>
            </div>
            <p class="card-text home_description">{{ $book->description }}</p>
            <a class="btn btn-dark" href="{{ secure_url("detail/$book->id") }}">View detail</a>
          </div> <!-- end card-body -->
        </div> <!-- end card-->
      @endforeach
    </div>
  </div>
@endsection