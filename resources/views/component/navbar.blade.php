@php
    $path = storage_path() . '/json/navbar.json';
    $json = json_decode(file_get_contents($path), true);
    $nav_item = $json['navbar'];
@endphp

<div class="container logo">
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