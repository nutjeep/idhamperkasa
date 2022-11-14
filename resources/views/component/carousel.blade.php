<div class="container d-flex justify-content-center">
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
  
      @foreach ($sliders as $key => $slider)
      <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
        <img src="{{ asset('storage/'. $slider->slider) }}" class="d-block w-100" alt="...">
      </div>
      @endforeach
      
      {{-- <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
      </div> --}}
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>