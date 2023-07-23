@extends('layout.app-dashboard')

@push('head')
  {{-- DataTables --}}
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
  <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addCategory">Add Category</button>
  <div class="card shadow">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Total Product</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->product->count() }}</td>
                <td>
                  <form action="{{ route('delete.category', $item->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="confirm('Hapus Kategori?')" class="btn btn-sm btn-outline-danger">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- Modal Add Category --}}
  <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route('store.category') }}" method="post">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="addCategoryLabel">New Category</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addCategory" action="">
              <div class="mb-3">
                <label for="categoryName">Name</label>
                <input type="text" id="categoryName" class="form-control" name="name" required>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
            <button submit="button" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('script')
  <!-- DataTabels -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endpush