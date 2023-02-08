@extends('backend.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Edit About</h1>
    </div>

    <div class="col-lg-10">
        <form action="/dashboard/{{ $about->id }}" method="post">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="about"><h5>Home page</h5></label>
                <input id="about" type="hidden" name="about" value="{!! old('about', $about->about) !!}">
                <trix-editor input="about"></trix-editor>
            </div>
            <div class="mb-4">
                <label for="company"><h5>Company Profile</h5></label>
                <input id="company" type="hidden" name="company" value="{!! old('company', $about->company) !!}">
                <trix-editor input="company"></trix-editor>
            </div>
            <div class="mb-4">
                <label for="visi"><h5>Visi</h5></label>
                <input id="visi" type="hidden" name="visi" value="{!! old('visi', $about->visi) !!}">
                <trix-editor input="visi"></trix-editor>
            </div>
            <div class="mb-4">
                <label for="misi"><h5>Misi</h5></label>
                <input id="misi" type="hidden" name="misi" value="{!! old('misi', $about->misi) !!}">
                <trix-editor input="misi"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection