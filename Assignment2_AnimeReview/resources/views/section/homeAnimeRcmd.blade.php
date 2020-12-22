<h6 class="border-bottom border-gray pb-2 mb-0">Be the first reviewer for following animation</h6>
@foreach($animes as $anime)
<div class="media text-muted pt-3">
  <img alt="anime photo" class="mr-2 rounded" src="{{$anime->photos->count() > 0 ? secure_asset($anime->photos[0]->photo_path) : secure_asset('/defaultImg/default.png')}}" data-holder-rendered="true" style="width: 32px; height: 32px;">
  <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
    <div class="d-flex justify-content-between align-items-center w-100">
      <strong class="text-gray-dark"><a href='{{secure_url("anime/detail/$anime->id")}}'>{{$anime->title}}</a></strong>
    </div>
  </div>
</div>
@endforeach
<h6 class="border-bottom border-gray pb-2 pt-4 mb-0">Maybe you would like to also review following animation</h6>
@foreach($animes_highReview as $anime)
  @if(!in_array($anime->id, $reviewed))
  
  <div class="media text-muted pt-3">
    <img alt="anime photo" class="mr-2 rounded" src="{{$anime->photos->count() > 0 ? secure_asset($anime->photos[0]->photo_path) : secure_asset('/defaultImg/default.png')}}" data-holder-rendered="true" style="width: 32px; height: 32px;">
    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
      <div class="d-flex justify-content-between align-items-center w-100">
        <strong class="text-gray-dark"><a href='{{secure_url("anime/detail/$anime->id")}}'>{{$anime->title}}</a></strong>
      </div>
    </div>
  </div>
  @endif
@endforeach