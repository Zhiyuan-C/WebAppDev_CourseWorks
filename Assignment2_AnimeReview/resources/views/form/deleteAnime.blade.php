<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteAnime">Delete this Anime</button>
<!-- Modal -->
<div class="modal fade" id="deleteAnime" tabindex="-1" role="dialog" aria-labelledby="deleteAnimeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="deleteAnimeLabel">Delete this anime</h5>
        <!-- close button -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <!-- Content -->
      <div class="modal-body">
        Are you sure want to delete this Anime? All the reviews will also be deleted
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form method="POST" action="{{ route('anime.destroy', ['anime'=>$anime->id]) }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          <!--<a href="" style="color: white;">Delete</a>-->

      </div>
    </div>
  </div>
</div>
<!-- End Modal -->