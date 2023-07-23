@extends('layout.app-dashboard')

@section('content')
<form action="{{ route('update.user') }}" method="post">
  @csrf
  <div class="row mb-4">
    <div class="col-lg-2 d-flex align-items-center">
      <span class="fs-6 fw-semibold">Username</span>
    </div>
    <div class="col-lg-6">
      <input type="text" name="username" class="form-control" value="{{ $user->username }}" autofocus>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-lg-2 d-flex align-items-center">
      <span class="fs-6 fw-semibold">Email</span>
    </div>
    <div class="col-lg-6">
      <input type="text" name="email" class="form-control" value="{{ $user->email }}">
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-lg-2 d-flex align-items-center">
      <span class="fs-6 fw-semibold">Password</span>
    </div>
    <div class="col-lg-6">
      <input type="password" name="password" class="form-control">
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 offset-lg-2">
      <button class="btn btn-primary">Save Changes</button>
    </div>
  </div>
</form>
@endsection