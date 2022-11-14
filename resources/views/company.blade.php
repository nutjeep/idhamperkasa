@extends('main')

@section('body')

<div class="body-content">
    @include('component.sidebar')

    <div class="container col-lg-8 content p-4">
        @foreach ($abouts as $about)
            <div class="sub-content about mb-4 animate__animated animate__fadeInUp">
                <div>{!! $about->about !!}</div>
            </div>
            <div class="sub-content visi mb-4 animate__animated animate__fadeInUp">
                <h4 class="mb-2" style="font-weight: 600;">Visi</h4>
                <div>{!! $about->visi !!}</div>
            </div>
            <div class="sub-content misi animate__animated animate__fadeInUp">
                <h4 class="mb-2" style="font-weight: 600;">Misi</h4>
                <div>{!! $about->misi !!}</div>
            </div>
        @endforeach
    </div>
</div>

@endsection()