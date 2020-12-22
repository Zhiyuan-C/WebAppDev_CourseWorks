<h5>You are currently following those users</h5>
@if($follows->count() > 0)
  @foreach($follows as $follow)
    <div class="media text-muted pt-2">
      <div class="media-body pb-2 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">{{$follow->nick_name}}</strong>
          <div>
            <form method="post" action="{{route('unfollow.user', ['following_id'=>$follow->id])}}" class="form-inline">
              {{ csrf_field() }}
              <button type="submit" class="badge badge-success">Unfollow</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@else
  You still haven't follow any users yet.
@endif