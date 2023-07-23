@extends('layout.app-dashboard')

@push('style')
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

@section('content')

@if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="row my-5">
  <div class="col-lg-7 col-sm-12" class="d-flex">
    <form action="{{ route('update.product', $product->slug) }}" method="post" class="d-flex">
      @method('put')
      @csrf
      <input type="text" class="me-3 form-control form-control-lg" name="name" value="{{ $product->name }}" autofocus>
      <div>
        <button type="submit" class="btn btn-info">Save</button>
      </div>
    </form>
  </div>
</div>

<div class="row">
  <div>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPhotoProduct">Add Image</button>
  </div>
  @foreach ($photoProduct as $photo)
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="card photo-product mb-2" data-bs-toggle="modal" data-bs-target="#photo-{{ $photo->id }}">
        <img src="{{ asset('storage/'.$photo->img_name) }}" class="card-img-top" alt="{{ $product->name }}" style="width: 100%; height: auto;">
      </div>
      <div class="text-center">
        <form action="{{ route('delete.photo.product', $photo->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
      </div>
    </div>

    <!-- Modal Photo Product -->
    <div class="modal fade" id="photo-{{ $photo->id }}" tabindex="-1" aria-labelledby="photo-{{ $photo->id }}Label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
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
            <form action="{{ route('delete.photo.product', $product->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>

{{-- Modal Add Photo Product --}}
<div class="modal fade" id="addPhotoProduct" tabindex="-1" aria-labelledby="addPhotoProductLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('store.photo.product') }}" method="post" enctype="multipart/form-data">
        @csrf 
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addPhotoProductLabel">New Image {{ $product->name }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="input-group">
              <input type="file" class="form-control" name="img_name[]" id="inputGroupFile02" multiple>
              <label class="input-group-text" for="inputGroupFile02"><i class="far fa-images"></i></label>
            </div>
            *Max file size: 300 KB
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn text-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection