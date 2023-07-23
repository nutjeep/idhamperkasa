@extends('layout.app-dashboard')

@push('head')
  {{-- DataTables --}}
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">  
@endpush

@section('content')
  <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addProduct">Add Product</button>
  
@if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="card shadow">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">{{ $company }}</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->category->name }}</td>
              <td class="d-flex">
                <a href="{{ route('edit.product', $product->slug) }}"><button class="badge badge-primary mx-1 btn">Edit</button></a>
                <form action="{{ route('delete.product', $product->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('delete')
                  <button type="submit" onclick="confirm('Yakin menghapus data?')" class="badge badge-danger mx-1 btn">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- Modal Add Product --}}
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <form action="{{ $route }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addProductLabel">New Product {{ $company }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="ProductName">Name</label>
            <input type="text" id="ProductName" class="form-control" name="name" autofocus>
          </div>
          <div class="mb-3">
            <label for="category">Category</label>
            <select class="form-select" id="select2" name="category_id" required>
              <option selected disabled>Select Category</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <input type="hidden" name="slug">
          <input type="hidden" name="company_id">
          <div class="mb-3">
            <label for="">Images</label>
            <div class="input-group">
              <input type="file" class="form-control" name="img_name[]" id="inputGroupFile02" multiple>
              <label class="input-group-text" for="inputGroupFile02"><i class="far fa-images"></i></label>
            </div>
            *Max file size: 300 KB
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('script')
  {{-- DataTabels  --}}
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endpush