<!-- Rating -->
<div>
  <label>Rating</label>
  <select class="form-control" name="edit_rating">
    @foreach($rating_opt as $option)
      <option value="{{ $option }}" {{ $rating == $option ? "selected":"" }}>{{ $option }}</option>
    @endforeach
  </select>
</div>

<!-- Message -->
<div class="form-group">
  <label for="message-text" class="col-form-label">Message:</label>
  <div class="{{ $errors->has('edit_message') ? 'error':'' }}">
    <textarea class="form-control" name="edit_message" id="message-text">{{ $message }}</textarea>
  </div>
  <div class="error_message">{{ $errors->has('edit_message') ? $errors->first('edit_message') : ''}}</div> 
</div>