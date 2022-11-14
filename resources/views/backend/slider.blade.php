@extends('backend.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Slider</h1>
</div>

<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#sliderModal">Add image slider</button>

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
            <th scope="col">Image Slider</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($sliders as $slider)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>Image {{ $loop->iteration }}</td>
              <td></td>
              <td>
                <form action="/dashboard/slider/{{ $slider->id }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="badge bg-danger border-0" title="Delete" onclick="return confirm('Anda ingin menghapus data ?')"><span data-feather="trash-2"></span></button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center text-danger"><i>No slider yet!</i></td>
            </tr>
          @endforelse
        </tbody>
    </table>
</div>
@endsection

<div class="modal fade" id="sliderModal" tabindex="-1" aria-labelledby="sliderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sliderModalLabel">Add new image slider</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/slider" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3 slider">
            <label for="slider" class="form-label">Upload Image Slider</label>
            <input type="file" class="form-control form-control-sm" id="slider" name="slider" required>
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