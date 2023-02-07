<div class="container logo" style="display: flex;">
    <img src="{{ asset('img/logo.png') }}" alt="Logo Perusahaan" style="max-height: 50px; width: auto; margin-right: 15px;">
    <h1>IDHAM <span>PERKASA</span></h1>
</div>
<div class="navbar mb-5">
    <div class="container">
        <div class="toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul>
            @foreach ($nav_item as $item)
            <li><a href="{{ $item['href'] }}">{{ $item['nav-item-text'] }}</a></li>
            @endforeach
        </ul>       
    </div>
</div>