<!-- 
Current file have 1 variable from detail:
1. $bookid
-->

<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteBook">Delete this book</button>
<!-- Modal -->
<div class="modal fade" id="deleteBook" tabindex="-1" role="dialog" aria-labelledby="deleteBookLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="deleteBookLabel">Delete this book</h5>
        <!-- close button -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Content -->
      <div class="modal-body">
        Are you sure want to delete this book? All the reviews will also be deleted
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger"><a href="{{secure_url("action/delete/$bookid")}}" style="color: white;">Delete</a></button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->