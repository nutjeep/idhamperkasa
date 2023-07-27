<div class="container mb-3">
  <div class="logo d-flex mb-3">
    <img src="{{ asset('img/logo-pt.webp') }}" alt="Logo" style="max-height: 50px; width: auto; margin-right: 15px;">
    <h1 style="color:#1E6F5C;" class="h2">PT. IDHAM SAPTA PERKASA</h1>
  </div>
  <div class="logo d-flex">
    <img src="{{ asset('img/logo-cv.webp') }}" alt="Logo" style="max-height: 50px; width: auto; margin-right: 15px;">
    <h1 style="color:#1E6F5C;" class="h2">CV. IDHAM PERKASA</h1>
  </div>
</div>
<div class="navbar mb-5">
  <div class="container">
    <div class="toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <ul  x-data="{open:false}">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li @click="open = true"><a href="#">Company Profile <i class="bi bi-caret-down-fill"></i></a></li>
      <div class="dropdown-item"  x-show="open" x-transition:enter.duration.500ms x-transition:leave.duration.400ms @click.away="open = false">
        @foreach ($companies as $item)
          <a href="{{ route('company', $item->slug) }}" class="text-decoration-none mb-3">{{ $item->name }}</a>
        @endforeach
      </div>
      <li><a href="{{ route('contact') }}">Contact</a></li>
    </ul>       
  </div>
</div>