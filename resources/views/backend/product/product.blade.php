@extends('backend.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Product</h1>
  </div>

  <a href="/dashboard/product/create" class="btn btn-primary mb-3">Add new product</a>

  <div class="col-lg-8">
    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        <b>{{ session('success') }}</b>
      </div>
    @endif
    @if(session()->has('updated'))
      <div class="alert alert-warning" role="alert">
        <b>{{ session('updated') }}</b>
      </div>
    @endif
    @if(session()->has('deleted'))
      <div class="alert alert-danger" role="alert">
        <b>{{ session('deleted') }}</b>
      </div>
    @endif
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
        @forelse ($products as $product)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $product->product_name }}</td>
          <td>{{ $product->category->category_name }}</td>
          <td class="d-flex">
            <a href="/dashboard/product/{{ $product->id }}/edit" title="Update" class="badge bg-warning me-2"><span data-feather="edit"></span></a>
            <form action="/dashboard/product/{{ $product->id }}" method="post">
              @csrf
              @method('delete')
              <button class="badge bg-danger border-0" title="Delete" onclick="return confirm('Anda ingin menghapus data ?')"><span data-feather="trash-2"></span></button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center text-danger"><i>No product yet!</i></td>
        </tr>
        @endforelse
      </tbody>
    </table>
    <div class="pagination" style="display: list-item;">
      <div class="page mb-2">
        Page : {{ $products->currentPage() }}
      </div>
      <div class="page">
        {{ $products->links() }}
      </div>
    </div>
  </div>
@endsection