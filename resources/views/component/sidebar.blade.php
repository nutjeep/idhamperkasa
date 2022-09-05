<div class="side-bar">
    <h5 class="mb-3">Our Product</h5>
    <div class="menu">

        @foreach ($categories as $category)
        <div class="item">
            <a class="sub-btn">{{ $category->name }}
                <i class="bi bi-caret-right-fill dropdown"></i>
            </a>
            <div class="sub-menu">  
                @foreach($products as $product)
                <a href="{{ $product->slug }}">{{ $product->product_name }}</a>
                @endforeach
            </div>
        </div>
        @endforeach        

        {{-- <div class="item">
            <a class="sub-btn">Safety <i class="bi bi-caret-right-fill dropdown"></i></a>
            <div class="sub-menu">
                @php
                   $products_safety = App\Models\Product::where('category_id', 1)->get();
                @endphp
                @foreach ($products_safety as $product)
                    <a href="{{ $product->slug }}">{{ $product->product_name }}</a>
                @endforeach
            </div>
        </div> --}}

    </div>
</div>