@extends('backend.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Product</h1>
  </div>

  <a href="/dashboard/product/create" target="blank" class="btn btn-primary mb-3">Add new product</a>

  <div class="col-lg-8">
    <table class="table table-responsive table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->category->category_name }}</td>
            <td>
              <a href="/dashboard/product/{{ $product->id }}/edit" target="_blank" title="Update" class="badge bg-warning me-2"><span data-feather="edit"></span></a>
              <a href="#" title="Delete" class="badge bg-danger"><span data-feather="trash-2"></span></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection