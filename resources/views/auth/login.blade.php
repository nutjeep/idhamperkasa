@extends('layout.app-auth')

@section('content')
  <div class="card o-hidden border-0 shadow-lg my-5">
    @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif
    <div class="card-body p-5">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
        </div>
        <form action="{{ route('authentication') }}" method="post" class="user">
          @csrf
          <div class="form-group">
            <input type="email" class="form-control form-control-user"
              id="exampleInputEmail" name="email" aria-describedby="emailHelp"
              placeholder="Enter Email Address...">
          </div>
          <div class="form-group mb-5">
            <input type="password" class="form-control form-control-user"
              id="exampleInputPassword" name="password" placeholder="Password">
          </div>
          
          <button type="submit" class="btn btn-primary btn-user btn-block">
            Login
          </button>
        </form>

    </div>
  </div>
@endsection