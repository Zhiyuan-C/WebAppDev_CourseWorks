<!-- 
Current file have 3 variables from detail:
1. $reviews
2. $rating_opt
3. $bookid
-->

@if($reviews)
  @foreach($reviews as $review)
  <div class="review">
    <div class="card border-light mb-3">
      
      <!-- Review header : User nick name, edit button to edit review -->
      <div class="card-header review_header">
        <div class="row">
          <div class="col-11 review_user_name">{{ $review->nick_name }}</div>
          <!--Edit Review-->
            @component('action.editReview', ['review'=>$review, 'rating_opt'=>$rating_opt, 'bookid'=>$bookid])
            @endcomponent
          <!--End Edit Review-->
        </div> <!--End row-->
      </div> <!--End card-header -->
  
      <div class="card-body">
        <h5 class="card-title">Rating: {{$review->rating}}</h5>
        <p class="card-text">{{ $review->message }}</p>
      </div> <!--End card-body -->
  
    </div> <!--End card-->
  </div> <!-- End review-->
  @endforeach
  
@else
  <div class="review"><div class="card border-light mb-3">No reviews yet</div></div>
@endif