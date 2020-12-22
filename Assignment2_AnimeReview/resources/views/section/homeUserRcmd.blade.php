<h6 class="border-bottom border-gray pb-2 mb-0">Recommend users</h6>
@foreach($rcmd_users as $rcmd_user)
<div class="media text-muted pt-2">
  <div class="media-body pb-2 mb-0 small lh-125 border-bottom border-gray">
    <div class="d-flex justify-content-between align-items-center w-100">
      <strong class="text-gray-dark">{{$rcmd_user->nick_name}}</strong>
      <div>
        <form method="post" action="{{route('follow.user',['follow_id'=>$rcmd_user->id])}}" class="form-inline">
          {{ csrf_field() }}
          <button type="submit" class="badge badge-primary">Follow</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
