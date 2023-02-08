@extends('backend.main')

@section('container')   
  <a href="/dashboard/contact" class="btn btn-outline-secondary mt-3">< Back</a>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Edit Contact</h1>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <form action="/dashboard/contact/{{ $contact->id }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="location">Location</label>
          <input type="text" class="form-control" name="location" id="location" value="{{ old('location', $contact->location) }}" required autofocus>
          @error('location')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" value="{{ old('address', $contact->address) }}" required autofocus>
          @error('address')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $contact->email) }}" required autofocus>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="telp">Telepon</label>
          <input type="text" class="form-control" name="telp" id="telp" value="{{ old('telp', $contact->telp) }}" required autofocus>
          @error('telp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
      </form> 
    </div>
  </div>
@endsection