@extends('main')

@section('body')
<div class="body-content">

    @include('component.sidebar')

    <div class="container content p-4">
        <h4 class="mb-3">{{ $product->product_name }}</h4>
        <div class="catalog">
            <img height="200" src="{!! $product->catalog !!}" alt="">
        </div>
        <div class="gallery">
            <img height="200" src="{!! $product->gallery !!}" alt="">
        </div>
    </div>
</div>
@endsection