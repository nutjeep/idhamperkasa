@extends('backend.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Show</h2>
  </div>

  <a href="/dashboard/" class="mt-3 me-3 mb-5 btn btn-outline-secondary">< Back</a>
  <a href="/dashboard/{{ $about->id }}/edit" class="mt-3 mb-5 btn btn-warning">Edit</a>

  <div class="row">
    <div class="col-lg-7">
      <h3>Home page</h3>
      {{-- @foreach ($abouts as $about) --}}
        <div>{!! $about->about !!}</div>
      {{-- @endforeach --}}

      <h3 class="mt-5">Company Profile</h3>
      {{-- @foreach ($abouts as $about) --}}
        <div>{!! $about->company !!}</div>
      {{-- @endforeach --}}
    </div>
    <div class="col-lg-4 offset-lg-1">
      <div class="visi mb-3">
        <h3>Visi</h3>
        <div>
          {{-- @foreach ($abouts as $about) --}}
            <div>{!! $about->visi !!}</div>
          {{-- @endforeach --}}
        </div>
      </div>
      <div class="misi">
        <h3>Misi</h3>
        <div>
          {{-- @foreach ($abouts as $about) --}}
            <div>{!! $about->misi !!}</div>
          {{-- @endforeach --}}
        </div>
      </div>
    </div>
  </div>
@endsection