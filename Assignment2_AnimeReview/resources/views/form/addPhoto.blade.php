<div class="add_rev collapse {{ old('action_type') == 'add_photo' && count($errors) > 0 ? 'show':'' }}" id="collasePhoto">
  <div class="card card-body">
    <form method="post" action='{{secure_url("photo/$anime->id/add")}}' enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="action_type" value="add_photo">
      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
      
      <!-- If error input, error alert -->
      @if(old('action_type') == 'add_photo' && count($errors) > 0)
        <div class="alert alert-danger" role="alert">
          Unable to add photo:
            @foreach ($errors->all() as $error)
              {{ $error }}
            @endforeach

        </div>
      @endif
      
      <div class="form-group">
        <label>Upload photos</label>
        <input type="file" name="images[]" class="form-control-file" multiple value="{{old('images')}}">
        <div>{{ $errors->has('images') ? $errors->first('images') : ''}}</div>
      </div>
      
      <button type="submit" class="btn btn-outline-dark full_width">Add</button>
    </form>
  </div>
</div>  