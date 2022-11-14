@php
    use App\Models\Product;
@endphp

<div class="side-bar">
    <h5 class="mb-3">Our Product</h5>
    <div class="menu">
        @foreach ($categories as $category)
        <div class="item">
            <a class="sub-btn">{{ $category->category_name }}
                <i class="bi bi-caret-right-fill dropdown"></i>
            </a>
            <div class="sub-menu">  
                @php
                    $products = App\Models\Product::where('category_id', $category->id)->get();
                @endphp
                @foreach($products as $product)
                <a href="{{ $product->slug }}">> {{ $product->product_name }}</a>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>