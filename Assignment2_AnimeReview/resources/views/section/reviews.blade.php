@if($errors->has('type'))
<div class="alert alert-danger" role="alert">
  {{$errors->first('type')}}
</div>
@endif
<div class="row">
  <!-- Sort reviews -->
  <div class="col-md-1">
    <div class="btn-group">
      <button class="btn btn-secondary btn-sm dropdown-toggle float-right" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sort
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href='{{secure_url("anime/review_date/$anime->id")}}'>By date</a>
        <a class="dropdown-item" href='{{secure_url("anime/review_rating/$anime->id")}}'>By rating</a>
      </div>
    </div>
  </div>
  <!-- Pagination -->
  <div class="review_pagination col-md-11">
    {{ $reviews->links("pagination::bootstrap-4") }}
  </div>
</div>
<!-- Review content -->
@foreach($reviews as $review)
  @if($review->likes_count == $review->dislikes_count)
    <div class="review">
  @else
    <div class="review {{$review->likes_count > $review->dislikes_count ? 'shadow-lg more_likes':'more_dislikes'}}">
  @endif
    <div class="card border-light mb-3">
    
    <!-- Review header  -->
    <div class="card-header review_header">
      <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-start">
          <!-- Nick name -->
          <div class="review_user_name pr-2">{{ $review->users->nick_name }}</div>
            @if(Auth::check() && $review->users->id != Auth::user()->id)
              <!-- Unfollow -->
              @if(in_array($review->users->id, $following))
                <div>
                  <form method="post" action="{{route('unfollow.user', ['follow_id' => $review->users->id])}}" class="form-inline">
                    {{ csrf_field() }}
                    <button type="submit" class="badge badge-success">Unfollow</button>
                  </form>
                </div>
              @else
                <!-- Follow -->
                <div>
                  <form method="post" action="{{route('follow.user', ['follow_id' => $review->users->id])}}" class="form-inline">
                    {{ csrf_field() }}
                    <button type="submit" class="badge badge-primary">Follow</button>
                  </form>
                </div> 
              @endif
            @endif
        </div>
        <div class="d-flex justify-content-end">
          @can('user_review', $review)
            <!--Delete Review-->
            <div class="pr-2">
              <form method="POST" action='{{ secure_url("review/$review->id") }}'>
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
            </div>
          @endcan
          
          @can('user_review', $review)
            <!--Edit Review-->
            @include('form.editReview', ['action'=>'edit'])
          @endcan
        </div>
      </div>
    </div> 
    <!--End card-header -->
    
    <div class="card-body">
      <h5 class="card-title">Rating: {{$review->rating}}</h5>
      <p class="card-text">{{ $review->message }}</p>
      <div class="d-flex justify-content-between">
        @if(Auth::check() && Auth::user()->id != $review->user_id && !in_array($review->id, $voted))
          <!-- Vote for like or dislike -->
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
      <!-- Create + update date -->
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

<!-- Pagination -->
<div class="review_pagination">
  {{ $reviews->links("pagination::bootstrap-4") }}
</div>
  
  
