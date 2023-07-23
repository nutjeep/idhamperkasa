@extends('layout.app-dashboard')

@section('content')
  {{-- PT. Idham Sapta Perkasa --}}
  <div class="row">
    <div class="col-lg-3">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                Product Category</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories->count() }} Categories</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-boxes fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                PT. Idham Sapta Perkasa</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $productsPT->count() }} Products</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-box fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                CV. Idham Perkasa</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $productsCV->count() }} Products</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-box fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>

@endsection