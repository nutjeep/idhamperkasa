@extends('main')

@section('body')
@include('component.carousel')
<div class="body-content">
    
    @include('component.sidebar')

    <div class="container col-lg-8 content p-4">
        @foreach ($abouts as $about)
            <div class="sub-content about mb-4 animate__animated animate__fadeInUp">
                <div>{!! $about->company !!}</div>
            </div>
        @endforeach
    </div>

</div>
@endsection()