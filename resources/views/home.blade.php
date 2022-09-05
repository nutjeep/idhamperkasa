@extends('main')

@section('body')

<div class="body-content">
    
    @include('component.sidebar')

    <div class="container content p-4">
        @foreach ($abouts as $about)
            <div class="sub-content about mb-4 animate__animated animate__fadeInUp">
                <h2>About</h2>
                <div>{!! $about->about !!}</div>
            </div>
            <div class="sub-content visi mb-4 animate__animated animate__fadeInUp">
                <h2>Visi</h2>
                <div>{!! $about->visi !!}</div>
            </div>
            <div class="sub-content misi animate__animated animate__fadeInUp">
                <h2>Misi</h2>
                <div>{!! $about->misi !!}</div>
            </div>
        @endforeach
    </div>

</div>

@endsection()