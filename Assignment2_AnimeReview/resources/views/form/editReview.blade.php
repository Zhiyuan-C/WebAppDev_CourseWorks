
<button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="{{ old('action_type') == 'edit' && old('user_id')==$review->user_id ? '#show_m': '#edit'.$review->id}}">Edit</button>


<!-- Modal -->
<div class="modal fade" id="{{old('action_type') == 'edit' && old('user_id')==$review->user_id ? 'show_m': 'edit'.$review->id}}" tabindex="-1" role="dialog" aria-labelledby="editReviewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <!-- Error alert -->
      @if(old('action_type') == 'edit' && count($errors) > 0)
        <div class="alert alert-danger" role="alert">
          {{$errors->first('message')}}
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
        <form method="post" action='{{secure_url("review/$review->id/edit")}}'>
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input type="hidden" name="action_type" value="edit">
          <input type="hidden" name="anime_id" value="{{ $anime->id }}">
          <input type="hidden" name="user_id" value="{{ $review->user_id }}">
          
          @if('action_type' == 'edit' && count($errors) > 0)
            @include('formSection.editReviewForm', ['rating' => old('edit_rating'), 'message' => old('edit_message')])
          @else
            @include('formSection.editReviewForm', ['rating' => $review->rating, 'message' => $review->message])
          @endif
          
          <!-- Submit -->
          <button type="submit" class="btn btn-dark full_width" >Edit</button>
        </form>
      </div><!--end modal-body -->
    </div><!--end modal-content-->
  </div><!--end modal-dialog-->
</div>
<!-- End Modal for edit review -->