@extends('backend.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Contact</h1>
  </div>

  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#contactModal">Add new contact</button>

  <div class="col-lg-8">
    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        <b>{{ session('success') }}</b>
      </div>
    @endif
    @if(session()->has('update'))
      <div class="alert alert-warning" role="alert">
        <b>{{ session('update') }}</b>
      </div>
    @endif
    @if(session()->has('delete'))
      <div class="alert alert-danger" role="alert">
        <b>{{ session('delete') }}</b>
      </div>
    @endif
    
    <table class="table table-responsive table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Location</th>
          <th scope="col">Address</th>
          <th scope="col">Email</th>
          <th scope="col">Telepon</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contacts as $contact)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $contact->location }}</td>
          <td>{{ $contact->address }}</td>
          <td>{{ $contact->email }}</td>
          <td>{{ $contact->telp }}</td>
          <td class="d-flex border-none">
            <form>
              <a href="/dashboard/contact/{{ $contact->id }}/edit" title="Update" class="badge bg-warning me-2"><span data-feather="edit"></span></a>
            </form>
            <form action="/dashboard/contact/{{ $contact->id }}" method="post">
              @csrf
              @method('delete')
              <button class="badge bg-danger border-0" title="Delete" onclick="return confirm('Anda ingin menghapus data ?')"><span data-feather="trash-2"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactModalLabel">Add new contact</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/contact" method="post">
        @csrf
        <div class="modal-body">
          <div class="mb-3 category">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control form-control-sm" id="location" name="location" autofocus required>
            @error('telp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          </div>
          <div class="mb-3 category">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control form-control-sm" id="address" name="address" required>
            @error('telp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          </div>
          <div class="mb-3 category">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control form-control-sm" id="email" name="email" required>
          </div>
          @error('telp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <div class="mb-3 category">
            <label for="telp" class="form-label">Telepon</label>
            <input type="text" class="form-control form-control-sm" id="telp" name="telp" required>
          </div>
          @error('telp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>