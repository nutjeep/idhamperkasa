@extends('main', [
    'canonical' => route('company', $company->slug),
])

@section('body')

<div class="body-content">
  @include('component.sidebar')

  <div class="container col-lg-8 content p-4">
    <div class="sub-content about mb-4 animate__animated animate__fadeInUp">
      <h5 class="mb-2" style="font-weight: 600;">About Company</h5>
      <div>{!! $company->companyDetail->about !!}</div>
    </div>
    <div class="sub-content visi mb-4 animate__animated animate__fadeInUp">
      <h5 class="mb-2" style="font-weight: 600;">Visi</h5>
      <div>{!! $company->companyDetail->visi !!}</div>
    </div>
    <div class="sub-content misi animate__animated animate__fadeInUp">
      <h5 class="mb-2" style="font-weight: 600;">Misi</h5>
      <div>{!! $company->companyDetail->misi !!}</div>
    </div>
  </div>
</div>

@endsection()