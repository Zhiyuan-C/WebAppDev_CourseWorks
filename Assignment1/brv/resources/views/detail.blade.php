<!--
Current file have 3 variables from route:
1. $book
2. $reviews
3. $rating_opt
-->

@extends('layouts.master')
@section('title')
  BRV - {{$book->title}}
@endsection

@section('content')
  <div class="jumbotron book_detail_container">
    <!-- ********** Book Detail section ********** -->
    <div class="row">
      <div class="img_container col-md-3">
        <img src="{{secure_asset($book->cover)}}" alt="book cover" class="img-thumbnail"/>
      </div>
      <div class="col-md-9">
        <h1 class="display-4">{{$book->title}}</h1>
        <div class="row">
          <p class="col-md">Author: {{ $book->author }}</p>
          <p class="col-md">Published: {{ $book->published }}</p>
          <p class="col-md">Category: {{ $book->category }}</p>
        </div>
  
        <div class="row">
          <p class="col-md">Overall Rating: {{ !is_null($book->rating)? round($book->rating, 1) : '-'}}</p>
        </div>
        <div class="row">
          <p class="col-md">Total reviews: {{ $book->rev_num }}</p>
        </div>
        
        <hr class="hr_style">
        <p class="lead">{{ $book->description }}</p>
        <div class="detail_action_button">
          <!-- Edit book -->
          <a class="btn btn-outline-info" href="/action/edit/{{$book->id}}">Edit this book</a>
          <!-- Delete book -->
          @component('action.deleteBook', ['bookid'=>$book->id])
          @endcomponent
        </div>
      </div>
    </div>
    
    <!-- --------- End Book Detail section -------------- -->
    <!------------------------------------------------------>
    <!---------------- Reviews section --------------------->
    
    <!-- ********** Write review section ********** -->
    <div class="write_review_section">
      <hr class="my-4">
      <p>See the Review of this book</p>
      <p>
        <a class="btn btn-dark full_width" data-toggle="collapse" href="#collaseReview" role="button" aria-expanded="false" aria-controls="collaseReview">
          Write a review
        </a>
      </p>
      @component('action.addReview', ['bookid'=>$book->id, 'rating_opt'=>$rating_opt])
      @endcomponent
    </div>
    <!-- ********** End Write review section **********-->
    
    <!-- ********** Display reviews section **********-->
    <div class="review_container">
      @component('component.reviews', ['reviews'=>$reviews, 'rating_opt'=>$rating_opt, 'bookid'=>$book->id])
      @endcomponent
    </div>
    <!-- ********** End Display reviews section ********** -->
  </div>
@endsection