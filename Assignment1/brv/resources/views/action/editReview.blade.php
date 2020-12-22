<!-- 
Current file have 2 variables from component.reviews:
1. $review
2. $rating_opt
If empty error occurs, 2 variables from route:
1. Session('edit_error')
2. Session('check')
-->
<button type="button" class="btn btn-dark col-1 btn-sm" data-toggle="modal" data-target="{{Session('edit_error') && Session('check')['id']==$review->reviewid ? '#show_m': '#edit'.$review->reviewid}}">Edit</button>

<!-- Modal -->
<div class="modal fade" id="{{Session('edit_error') && Session('check')['id']==$review->reviewid ? 'show_m': 'edit'.$review->reviewid}}" tabindex="-1" role="dialog" aria-labelledby="editReviewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <!-- Error alert -->
      @if(Session('edit_error'))
        <div class="alert alert-danger" role="alert">
          {{Session('edit_error')}}
        </div>
      @endif
      
      <div class="modal-header">
        <!-- modal heading -->
        <h5 class="modal-title" id="editReviewLabel">Edit review from: {{$review->nick_name}}</h5>
        
        <!--close modal button-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!--close modal button end-->
      </div><!--end modal-header -->
      
      <div class="modal-body">
        <form method="post" action="/action/edit_review">
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{ $review->reviewid }}">
          <input type="hidden" name="nick_name" value="{{ $review->nick_name }}">
          <input type="hidden" name="bookid" value="{{ $bookid }}">
          <!-- Rating -->
          <div>
            <label>Rating</label>
            <select class="form-control" name="rating">
              @foreach($rating_opt as $option)
                <option value="{{ $option }}" {{ $review->rating == $option ? "selected":"" }}>{{ $option }}</option>
              @endforeach
            </select>
          </div>
          
          <!-- Message -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            @if(Session('edit_error'))
              <div class="{{ is_null(Session('check')['message']) ? 'empty':'' }}">
                <textarea class="form-control" name="message" id="message-text">{{ !is_null(Session('check')['message']) ? Session('check')['message'] : ''}}</textarea>
              </div>
            @else
              <textarea class="form-control" name="message" id="message-text">{{ $review->message }}</textarea>
            @endif
          </div>
          
          <!-- Submit -->
          <button type="submit" class="btn btn-dark full_width" >Edit</button>
        </form>
      </div><!--end modal-body -->
    </div><!--end modal-content-->
  </div><!--end modal-dialog-->
</div>
<!-- End Modal for edit review -->