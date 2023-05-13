@extends('main', [
    'canonical' => route('company'),
])

@section('body')

<div class="body-content">
    @include('component.sidebar')

    <div class="container col-lg-8 content p-4">
        @foreach ($abouts as $about)
            <div class="sub-content about mb-4 animate__animated animate__fadeInUp">
                <h5 class="mb-2" style="font-weight: 600;">Company</h5>
                <div>{!! $about->about !!}</div>
            </div>
            <div class="sub-content visi mb-4 animate__animated animate__fadeInUp">
                <h5 class="mb-2" style="font-weight: 600;">Visi</h5>
                <div>{!! $about->visi !!}</div>
            </div>
            <div class="sub-content misi animate__animated animate__fadeInUp">
                <h5 class="mb-2" style="font-weight: 600;">Misi</h5>
                <div>{!! $about->misi !!}</div>
            </div>
        @endforeach
    </div>
</div>

@endsection()