@extends('backend.main')
@php
  $product = App\Models\Product::count();
  $category = App\Models\Category::count();
@endphp
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Dashboard</h2>
  </div>

  <div class="row mb-4 d-flex">
    <div class="col-lg-4">
      <div class="card my-3">
        <div class="card-body bg-primary">
          <h6 class="card-text text-white-50">All Product</h6>
          <h5 class="card-title text-white mb-2">{{ $product }} products</h5>
        </div>
        <div class="card-footer bg-white d-flex justify-content-between">
          <a href="/dashboard/product" class="card-link text-decoration-none">View all products</a>
          <span data-feather="chevron-right" class="text-primary"></span>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card my-3">
        <div class="card-body bg-secondary">
          <h6 class="card-text text-white-50">All Category</h6>
          <h5 class="card-title text-white mb-2">{{ $category }} categories</h5>
        </div>
        <div class="card-footer bg-white d-flex justify-content-between">
          <a href="/dashboard/category" class="card-link text-decoration-none text-secondary">View all categories</a>
          <span data-feather="chevron-right" class="text-secondary"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-7">
      <h3>About</h3>
      @foreach ($abouts as $about)
        <div>{!! $about->about !!}</div>
      @endforeach
    </div>
    <div class="col-lg-4 offset-lg-1">
      <div class="visi mb-3">
        <h3>Visi</h3>
        <div>
          @foreach ($abouts as $about)
            <div>{!! $about->visi !!}</div>
          @endforeach
        </div>
      </div>
      <div class="misi">
        <h3>Misi</h3>
        <div>
          @foreach ($abouts as $about)
            <div>{!! $about->misi !!}</div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  @foreach ($abouts as $about)
    <a href="/dashboard/{{ $about->id }}/edit" target="_blank" class="mt-3 mb-5 btn btn-warning">Edit Home page</a>
  @endforeach
@endsection