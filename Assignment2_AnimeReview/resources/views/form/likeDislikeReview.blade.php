
<form method="post" action='{{secure_url("review/like_dislike/$review->id")}}' class="form-inline">
  {{ csrf_field() }}
  <label class="my-1 mr-2">Vote this review</label>
  <input type="hidden" name="review_id" value="{{$review->id}}"/>
  
  <select class="custom-select my-1 mr-sm-2" name="type">
    <option selected>Choose...</option>
    <option value="like">Like</option>
    <option value="dislike">Dislike</option>
  </select>

  <button type="submit" class="btn btn-primary my-1">Submit</button>
</form>