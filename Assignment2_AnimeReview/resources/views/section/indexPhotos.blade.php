<div class="carousel slide index_carousel" data-ride="carousel">
  <div class="carousel-inner">
    @if($anime->photos->count() > 0)
      @foreach($anime->photos as $photo)
        <div class="carousel-item {{$loop->first ? 'active':''}} cover">
          <img class="d-block cover_img" src="{{secure_asset($photo->photo_path)}}" alt="First slide">
        </div>
      @endforeach
    @else
      <div class="cover">
        <img class="cover_img" src="{{secure_asset('/defaultImg/default.png')}}">
      </div>
    @endif
  </div>
</div>