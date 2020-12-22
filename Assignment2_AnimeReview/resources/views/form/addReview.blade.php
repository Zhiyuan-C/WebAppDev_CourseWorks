<div class="add_rev collapse {{ old('action_type') == 'add' && count($errors) > 0 ? 'show':'' }}" id="collaseReview">
  <div class="card card-body">
    <form method="post" action='{{secure_url("review/$anime->id/add")}}'>
      {{csrf_field()}}
      <input type="hidden" name="action_type" value="add">
      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
      
      <!-- If error input, error alert -->
      @if($errors->has('user_id') || $errors->has('message'))
        <div class="alert alert-danger" role="alert">
          {{ $errors->has('user_id') ? $errors->first('user_id') : 'Unable to add review'}}
        </div>
      @endif
      
      <!-- Nick name -->
      <div class="row btm_padding">
        <div class="col">{{Auth::user()->nick_name}}</div>
      </div>
      
      <!-- Rating options -->
      <div class="row btm_padding">
        <div class="col">
          <label>Rating</label>
          <select class="form-control" name="rating">
            @foreach($rating_opt as $option)
              @if(count($errors) > 0)
                <option value="{{ $option }}" {{ $option == old('rating') ? 'selected':'' }}>{{ $option }}</option>
              @else
                <option value="{{ $option }}">{{ $option }}</option>
              @endif
            @endforeach
          </select>
        </div>
      </div>
      
      <!-- Message -->
      <div class="row btm_padding">
        <div class="col">
          <label>Review</label>
          <textarea class="form-control {{ $errors->has('message') ? 'error':'' }}" name="message">{{ old('message') }}</textarea>
          <div class="error_message">{{ $errors->has('message') ? $errors->first('message') : ''}}</div>
        </div>
        
      </div>
      <button type="submit" class="btn btn-outline-dark full_width">Submit review</button>
    </form>
  </div>
</div>  