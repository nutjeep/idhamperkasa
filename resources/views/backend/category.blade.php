@extends('backend.main')
@php
  use App\Models\Product;
@endphp
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Category</h1>
  </div>

  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#categoryModal">Add new category</button>
  
  <div class="col-lg-8">
    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    @if(session()->has('delete'))
      <div class="alert alert-warning" role="alert">
        {{ session('delete') }}
      </div>
    @endif
    
    <table class="table table-responsive table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category</th>
          <th scope="col">Total product</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($categories as $category)
        @php
          $product = Product::where('category_id', $category->id)->count();
        @endphp
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->category_name }}</td>
            <td>{{ $product }}</td>
            <td>
              <form action="/dashboard/category/{{ $category->id }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button class="badge bg-danger border-0" title="Delete" onclick="return confirm('Anda ingin menghapus data ?')"><span data-feather="trash-2"></span></button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center text-danger"><i>No category yet!</i></td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection

<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categoryModalLabel">Add new category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/category" method="post">
        @csrf
        <div class="modal-body">
          <div class="mb-3 category">
            <label for="name" class="form-label">Category name</label>
            <input type="text" class="form-control form-control-sm" id="name" name="category_name" autofocus required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>