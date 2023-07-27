@extends('main', ['canonical' => route('product', $product->slug)])

@push('style-landingpage')
  <style>
    .photo-product, 
    .photo-product img {
      transition: .3s;
    }

    .photo-product {
      width: 100%;
      height: 17rem;
      display: grid;
      place-items: center;
      overflow: hidden;
    }

    .photo-product img {
      object-fit: contain;
    }

    .photo-product:hover img{
      transform: scale(1.1);
      cursor: pointer;
    }

    .modal .modal-body {
      width: 100%;
      display: grid;
      place-items: center;
      overflow: hidden;
    }
  </style>
@endpush

@section('body')
<div class="body-content">

  @include('component.sidebar')

  <div class="container content p-4">
    <h2 class="mb-3" style="font-weight: 600;">{{ $product->name }}</h2>
    <div class="row mb-3">
      <div class="col-lg-12">
        <div class="description">
          {!! $product->description !!}
        </div>
      </div>
    </div>
    <div class="row mb-3">
      @foreach ($photoProduct as $photo)
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card photo-product" data-bs-toggle="modal" data-bs-target="#photo-{{ $photo->id }}">
            <img src="{{ asset('storage/'.$photo->img_name) }}" class="card-img-top" alt="{{ $product->name }}" style="width: 100%; height: auto;">
          </div>
        </div>

        <!-- Modal Photo Product -->
        <div class="modal fade" id="photo-{{ $photo->id }}" tabindex="-1" aria-labelledby="photo-{{ $photo->id }}Label" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title h3" id="photo-{{ $photo->id }}Label">{{ $product->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <img src="{{ asset('storage/'.$photo->img_name) }}" class="card-img-top" alt="{{ $product->name }}" style="width: 100%; height: auto;">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn text-danger" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection