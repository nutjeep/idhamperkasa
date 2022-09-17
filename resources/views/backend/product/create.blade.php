@extends('backend.main')

@section('container')   

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Add new product</h1>
    </div>

    <div class="col-lg-6">
        <form action="/dashboard/product" method="post" enctype="multipart/form-data"> 
            @csrf
            <label for="">Category</label>
            <select class="form-select mb-3" aria-label="Default select example">
                <option selected>Open this select menu</option>
                @foreach ($categories as $category)
                    <option value="1">{{ $category->name }}</option>
                @endforeach
            </select>

            <div class="mb-3">
                <label for="product_name">Product name</label>
                <input type="text" class="form-control" name="product_name" id="product_name" required autofocus>
            </div>
            <div class="mb-3">
                <label for="slug">slug</label>
                <input type="text" class="form-control form-control-sm" name="slug" id="slug" required>
            </div>
            <div class="mb-3">
                <label for="catalog">Catalog image</label>
                <input type="file" class="form-control" name="catalog" id="catalog">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection

