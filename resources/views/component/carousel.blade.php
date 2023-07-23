<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    @foreach ($sliders as $slider)
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}"  aria-label="Slide {{ $loop->iteration }}" @if($loop->first) class="active" aria-current="true" @endif></button>
    @endforeach
  </div>
  <div class="carousel-inner">
    @foreach ($sliders as $key => $slider)
    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
      <img src="{{ asset('storage/'. $slider->img_name) }}" class="d-block w-100" alt="Slider {{ $loop->iteration }}">
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>