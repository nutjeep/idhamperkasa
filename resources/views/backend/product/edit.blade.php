@extends('backend.main')

@section('container')   

    <a href="/dashboard/product" class="btn btn-outline-secondary mt-3">< Back</a>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Edit product</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="/dashboard/product/{{ $product->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <label for="">Category</label>
                <select class="form-select mb-3" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id', $product->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endif
                    @endforeach
                </select>

                <div class="mb-3">
                    <label for="product_name">Product name</label>
                    <input type="text" class="form-control" name="product_name" id="product_name" value="{{ old('product_name', $product->product_name) }}" required>
                    @error('product_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug">slug</label>
                    <input type="text" class="form-control form-control-sm" name="slug" id="slug" value="{{ old('slug', $product->slug) }}" required>
                    @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <input type="hidden" name="oldImage" value="{{ $product->catalog }}">

                <div class="mb-3">
                    <label for="catalog">Cover image</label>
                    <input type="file" accept="image/*" class="form-control" name="catalog" id="catalog">
                    <p class="text-black-50">Max file 2 MB</p>
                    @error('catalog')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="gallery">New image gallery</label>
                    <input type="file" class="form-control" accept="image/*" id="gallery" name="gallery[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form> 
        </div>

        {{-- Gallery image delete --}}
        <div class="col-lg-6 d-flex" style="flex-wrap: wrap;">
            @if (!empty($product->gallery))
            @foreach ($product->gallery as $gallery)
                <form action="/dashboard/product/gallery/{{ $gallery->id }}" method="post">
                    @csrf
                    @method("delete")
                    <div class="card p-3 m-3 text-center" style="box-shadow: 5px 5px 15px rgba(0,0,0,0.2); max-height: 260px; width: 150px;">
                        <img src="{{ asset('storage/gallery-images/'.$gallery->gallery) }}" class="card-img-top mb-3" alt="{{$product->product_name }}" style="max-width: 180px; max-height: 180px;">
                        <button class="btn btn-sm btn-danger"><span data-feather="trash-2"></span></button>
                    </div>
                </form>
            @endforeach
            @else
                <div class="d-flex justify-content-center align-items-center" style="width: 100%;">
                    <i class="fs-4 text-muted">No image gallery</i>
                </div>
            @endif
        </div>
    </div>
@endsection