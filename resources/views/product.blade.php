@extends('main')

@section('body')
<div class="body-content">

    {{-- @foreach ($categories as $category)
    <div class="item">
        <a class="sub-btn">{{ $category->name }} <i class="bi bi-caret-right-fill dropdown"></i></a>
        <div class="sub-menu">        
            @foreach($products as $product)
            <a href="{{ $product->slug }}">{{ $product->product_name }}</a>
            @endforeach
        </div>
    </div>
    @endforeach --}}

    @include('component.sidebar')

    <div class="container content p-4">
        <h4 class="mb-3">{{ $product->product_name }}</h4>
        <div class="images">
            <img height="200" src="{{ $product->images }}" alt="">
        </div>
    </div>
</div>
@endsection