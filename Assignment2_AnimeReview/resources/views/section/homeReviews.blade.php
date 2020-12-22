@foreach($reviews as $review)

  @if($review->likes_count == $review->dislikes_count)
    <div class="review">
  @else
    <div class="review {{$review->likes_count > $review->dislikes_count ? 'shadow-lg more_likes':'more_dislikes'}}">
  @endif

    <div class="card border-light mb-3">
      <!-- Review header-->
      <div class="card-header review_header">
        <div class="row">
          <div class="col-10 review_user_name">{{ $review->users->nick_name }}</div>
        </div> <!--End row-->
      </div> <!--End card-header -->
      <!-- Review content -->
      <div class="card-body">
        <h5 class="card-title"><a href="anime/detail/{{$review->animes->id}}">{{$review->animes->title}}</a></h5>
        <strong>Rating: {{$review->rating}}</strong>
        <p class="card-text">{{ $review->message }}</p>
        <div class="d-flex justify-content-between">
          @if(Auth::check() && Auth::user()->id != $review->user_id && !in_array($review->id, $voted))
            <!-- vote for like or dislike the review -->
            <div>@include('form.likeDislikeReview')</div>
          @else
            <div></div>
          @endif
          <!-- Like + Dislike -->
          <div class="d-flex justify-content-end">
            <div class="p-2">
              {{$review->likes_count}} likes
            </div>
            <div class="p-2">
              <span>{{$review->dislikes_count}} dislikes</span>
            </div>
          </div>
        </div>
        <!-- Create/update date -->
        <div class="text-right">
          <div>
            <small class="text-muted">Created: {{ $review->created_at }}</small> |
            <small class="text-muted">Updated: {{ $review->updated_at }}</small>
          </div>
        </div>
        
      </div> <!--End card-body -->
    </div> <!--End card-->
  </div> <!-- End review-->
@endforeach