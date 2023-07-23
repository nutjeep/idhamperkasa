{{-- <h2>PT IDHAM</h2>
@foreach ($products as $product)
  @foreach ($categories->where('id', $product->category_id) as $category)
      <h4>{{ $category->name }}</h4>
      @foreach ($products->where('category_id', $category->id) as $item)
        {{ $item->name }}
        <br>
      @endforeach
  @endforeach
@endforeach --}}

<div class="sidebar">
  <h4 class="mb-3 text-center text-uppercase">Our Product</h4>
  <div class="menu">
    <div class="item">
      <h5>PT. Idham S Perkasa</h5>
      @foreach ($categories as $category)
        @if (count($category->product->where('company_id', 1)) != 0)
          <a class="sub-btn">
            {{ $category->name }}
            <i class="bi bi-caret-right-fill dropdown"></i>
          </a> 
        @endif

        <div class="sub-menu">  
          @foreach ($category->product->where('company_id', 1) as $product)
            <a href="{{ route('product', $product->slug) }}">> {{ $product->name }}</a>
          @endforeach
        </div>
      @endforeach
    </div>
    <div class="item">
      <h5>CV. Idham Perkasa</h5>
      @foreach ($categories as $category)
        @if (count($category->product->where('company_id', 2)) != 0)
          <a class="sub-btn">
            {{ $category->name }}
            <i class="bi bi-caret-right-fill dropdown"></i>
          </a> 
        @endif

        <div class="sub-menu">  
          @foreach ($category->product->where('company_id', 2) as $product)
            <a href="{{ route('product', $product->slug) }}">> {{ $product->name }}</a>
          @endforeach
        </div>
      @endforeach
    </div>

    {{-- <div class="item">
      <h5>CV. Idham Perkasa</h5>

      <a class="sub-btn">
        Lain - lain
        <i class="bi bi-caret-right-fill dropdown"></i>
      </a>
      <div class="sub-menu">  
        <a href="">> Lain</a>
        <a href="">> lain</a>
      </div>
    </div> --}}
  </div>
</div>