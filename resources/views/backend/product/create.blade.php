@extends('backend.main')

@section('container')   

    <a href="/dashboard/product" class="btn btn-outline-secondary mt-3">< Back</a>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Add new product</h1>
    </div>

    <div class="col-lg-6 create-product">
        <form action="/dashboard/product" method="post" enctype="multipart/form-data"> 
            @csrf
            <div class="mb-3">
                <label for="category">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="product_name">Product name</label>
                <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" id="product_name" value="{{ old('product_name') }}"  autofocus>
                @error('product_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug">slug</label>
                <input type="text" class="form-control form-control-sm" name="slug" id="slug" value="{{ old('slug') }}" >
            </div>

            <div class="mb-3">
                <label for="catalog">Cover image</label>
                <input type="file" accept="image/*" class="form-control @error('catalog') is-invalid @enderror" name="catalog" id="catalog">
                <p class="text-black-50">Max file 500 kb | Click <a href="https://squoosh.app/">here</a> for resizing image</p>
                @error('catalog')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gallery">Product Gallery</label>
                <input type="file" class="form-control" accept="image/*" id="gallery" name="gallery[]" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection