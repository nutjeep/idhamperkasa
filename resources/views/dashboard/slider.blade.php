@extends('layout.app-dashboard')

@section('content')

@if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (count($sliders) == 0)
  <div class="d-flex align-items-center justify-content-center flex-column" style="height: 50vh;">
    <p class="fst-italic mb-3 fs-5">No Image Slider</p>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addImageSlider">Add Image</button>
  </div>
@else
  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addImageSlider">Add Image</button>
  @foreach ($sliders as $slider)
  <div class="row mb-4">
    <div class="col-lg-3 d-flex justify-content-center align-items-center">
      <span class="fs-5">Slide {{ $loop->iteration }}</span>
    </div>
    <div class="col-lg-6">
      <img src="{{ asset('storage/'.$slider->img_name) }}" alt="Slider"
        style="height: 300px;" class="mb-2 shadow-sm">
      <div class="d-flex">
        <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#updateImageSlider{{ $slider->id }}">Change</button>
        <form action="{{ route('delete.slider', $slider->id) }}" method="post">
          @method('delete')
          @csrf
          <button type="submit" onclick="confirm('Yakin menghapus Gambar?')" class="btn btn-danger btn-sm">Delete</button>
        </form>
      </div>
    </div>
  </div> 

  {{-- Modal Update Image Slider --}}
  <div class="modal fade" id="updateImageSlider{{ $slider->id }}" tabindex="-1" aria-labelledby="updateImageSlider{{ $slider->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form action="{{ route('update.slider', $slider->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="updateImageSlider{{ $slider->id }}Label">Change Image</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="">Image {{ $slider->id }}</label>
              <div class="input-group">
                <input type="file" class="form-control" name="img_name" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02"><i class="far fa-image"></i></label>
              </div>
              *Max file size: 1 MB
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  @endforeach

@endif 

{{-- Modal Add Image Slider --}}
<div class="modal fade" id="addImageSlider" tabindex="-1" aria-labelledby="addImageSliderLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action="{{ route('store.slider') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addImageSliderLabel">Add Image</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="">Image</label>
            <div class="input-group">
              <input type="file" class="form-control" name="img_name" id="inputGroupFile02">
              <label class="input-group-text" for="inputGroupFile02"><i class="far fa-image"></i></label>
            </div>
            *Max file size: 1 MB
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection