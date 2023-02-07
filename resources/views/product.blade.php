@extends('main')

@section('body')
<div class="body-content">

    @include('component.sidebar')

    <div class="container content p-4">
        <h4 class="mb-3" style="font-weight: 600;">{{ $product->product_name }}</h4>
        <div class="row">
            <div class="col-lg-8">
                <div class="card catalog p-3 mb-3" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
                    <img src="{{ asset('storage/'. $product->catalog) }}" alt="{{ $product->product_name }}" style="width: 80%; height:auto;">
                </div>
            </div>
            <div class="col-lg-4" style="display: flex; flex-direction: column;">
                @foreach ($galleries as $gallery)
                    <div class="card p-3 mb-3" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
                        <img src="{{ asset('storage/gallery-images/'.$gallery->gallery) }}" class="card-img-top" alt="{{ $product->product_name }}" style="width: 100%; height: auto;">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection