<!-- Indicators -->
<ol class="carousel-indicators">
  @foreach($photos as $photo)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active':''}}"></li>
  @endforeach
</ol>
<div class="carousel-inner">
  @if($anime->photos->count() > 0)
    @foreach($photos as $photo)
      <div class="carousel-item {{$loop->first ? 'active' : ''}}">
        <div class="image_container">
          <img src="{{secure_asset($photo->photo_path)}}" alt="main image" class="gallery_image">
        </div>
        
        <div class="carousel-caption d-none d-md-block">
          <p class="photo_caption">Image uploaded by {{$photo->users->nick_name}}</p>
        </div>
      </div>
    @endforeach
  @else
  <div class="image_container">
    <img src="{{secure_asset('/defaultImg/default.png')}}" alt="default image" class="gallery_image">
  </div>
      
      
  @endif
</div>
<!-- Side Indicators -->
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>