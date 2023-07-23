@extends('main', [
    'canonical'         => route('home'),
])

@section('body')
  @include('component.carousel')
  <div class="body-content">
      
    @include('component.sidebar')

    <div class="container col-lg-8 content p-4">
      <div class="sub-content about mb-4 animate__animated animate__fadeInUp">
        <div>
          <strong>IDHAM PERKASA</strong> adalah perusahaan yang bergerak di bidang Rubber Product (Seal, Anti Slip Pallet, Membran, dll.)
          <br>
          Dengan didukung sumber daya manusia yang berpengalaman di dalam lingkup karet dan ditunjang dengan mesin cetak & CNC modern.
        </div>
      </div>
    </div>

  </div>
@endsection