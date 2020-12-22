<!-- 
Current file have 2 variables from detail:
1. $bookid
2. $rating_opt
-->

<div class="add_rev collapse {{ Session('error') ? 'show':'' }}" id="collaseReview">
  <div class="card card-body">
    <form method="post" action="/action/add_review/{{$bookid}}">
      {{csrf_field()}}
      
      <!-- If empty input, error alert -->
      @if(Session('error'))
        <div class="alert alert-danger" role="alert">
          {{Session('error')}}
        </div>
      @endif
      
      <div class="row btm_padding">
        <!-- Nick name -->
        <div class="col">
          <label for="nickname">Nick Name</label>
          <div class="{{ Session('error') && is_null(Session('check')['nick_name']) ? 'empty':'' }}">
            <input type="text" name="nick_name" class="form-control" placeholder="Nick name" value="{{ Session('error') && is_null(Session('check')['nick_name']) ? '':Session('check')['nick_name']}}" >
          </div>
        </div>
        <!-- Rating options -->
        <div class="col">
          <label>Rating</label>
          <select class="form-control" name="rating">
            @foreach($rating_opt as $option)
              <option value="{{ $option }}" {{ Session('check')['rating'] == $option ? 'selected':'' }}>{{ $option }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <!-- Message -->
      <div class="row btm_padding">
        <div class="col">
          <label>Review</label>
          <textarea class="form-control {{ Session('error') && is_null(Session('check')['message']) ? 'empty':'' }}" name="message"  rows="3">{{ Session('error') && is_null(Session('check')['message']) ? "":Session('check')['message'] }}</textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-outline-dark full_width">Submit review</button>
    </form>
  </div>
</div>  