@extends('layout.app-dashboard')

@push('head')
  {{-- Trix Editor --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
  <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
@endpush

@push('style')
  <style>
    trix-toolbar [data-trix-button-group="file-tools"],
    trix-toolbar .trix-button--icon-heading-1,
    trix-toolbar .trix-button--icon-quote,
    trix-toolbar .trix-button--icon-strike,
    trix-toolbar .trix-button--icon-link,
    trix-toolbar .trix-button--icon-increase-nesting-level,
    trix-toolbar .trix-button--icon-decrease-nesting-level
    { display:none; }

    .create-product trix-toolbar [data-trix-button-group="file-tools"]
    {display: inherit;}

    .create-product trix-toolbar [data-trix-button-group="text-tools"],
    .create-product trix-toolbar [data-trix-button-group="block-tools"]
    { display:none; }
  </style>
@endpush


@section('content')

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  @foreach ($companies as $item)
  <li class="nav-item" role="presentation">
    <button class="nav-link @if($loop->first) active @endif" id="{{ $item->slug }}-tab" data-bs-toggle="pill" data-bs-target="#{{ $item->slug }}" type="button" role="tab" aria-controls="{{ $item->slug }}" aria-selected="true">{{ $item->name }}</button>
  </li>
  @endforeach
</ul>

<div class="tab-content" id="pills-tabContent">
  @foreach ($companies as $item)
    <div class="tab-pane fade @if($loop->first) show active @endif" id="{{ $item->slug }}" role="tabpanel" aria-labelledby="{{ $item->slug }}-tab" tabindex="0">      
      <div class="row mb-3">
        <div class="col-lg-3 d-flex justify-content-center align-items-center">
          <span class="fw-semibold fs-5">About</span>
        </div>
        <div class="col-lg-6">
          <div class="card p-3 bg-white shadow-sm">
            {!! $item->companyDetail->about !!}
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-3 d-flex justify-content-center align-items-center">
          <span class="fw-semibold fs-5">Visi</span>
        </div>
        <div class="col-lg-6">
          <div class="card p-3 bg-white shadow-sm">
            {!! $item->companyDetail->visi !!}
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-3 d-flex justify-content-center align-items-center">
          <span class="fw-semibold fs-5">Misi</span>
        </div>
        <div class="col-lg-6">
          <div class="card p-3 bg-white shadow-sm">
            {!! $item->companyDetail->misi !!}
          </div>
        </div>
      </div>
      <div class="row mb-3 mt-4">
        <div class="col-lg-6 offset-lg-3">
          <div class="text-end">
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">Edit Information</button>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  @foreach ($companies as $company)
    {{-- Modal Update Information --}}
    <div class="modal fade" id="exampleModal{{ $company->id }}" tabindex="-{{ $loop->iteration }}" aria-labelledby="exampleModal{{ $company->id }}Label" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <form action="{{ route('update.company', $company->slug) }}" method="post">
          @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fw-bold text-primary fs-4" id="exampleModal{{ $company->id }}Label">{{ $company->name }}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="fw-semibold fs-5">About</label>
                <input id="about-{{ $loop->iteration }}" type="hidden" name="about" value="{!! $company->companyDetail->about !!}">
                <trix-editor input="about-{{ $loop->iteration }}"></trix-editor>
              </div>
              <div class="mb-3">
                <label class="fw-semibold fs-5" for="visi">Visi</label>
                <textarea class="form-control" name="visi" id="visi">{{ $company->companyDetail->visi }}</textarea>
              </div>
              <div class="mb-3">
                <label class="fw-semibold fs-5" for="misi">Misi</label>
                <textarea class="form-control" name="misi" id="misi">{{ $company->companyDetail->misi }}</textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  @endforeach
</div>

@endsection