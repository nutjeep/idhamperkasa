@php
    use App\Models\Product;
    use App\Models\Category;

    $categories = Category::all();
@endphp

<footer class="p-4" style="bottom: 0; margin-top: 70px;">
    <div class="logo mb-5">
        <h3 style="color: white">CV. IDHAM <span>PERKASA</span></h3>
    </div>
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <h5 class="text-white">Product</h5>
            <hr>
            @foreach ($categories as $category)
                <div class="mb-4 text-start">
                    <h6>{{ $category->category_name }}</h6>
                    <div class="sub-product">
                        @php
                            $products = App\Models\Product::where('category_id', $category->id)->get();
                        @endphp
                        @foreach($products as $product)
                            <small>- {{ $product->product_name }}</small>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-5">
            <h5 class="text-white">Contact</h5>
            <hr>
            <div class="addresses text-start">
                <div class="address mb-4">
                    <h6>Surabaya</h6>
                    <small>Jl. Simolawang Blok 1 No.23, Simokerto, Kec. Simokerto Kota Surabaya, Jawa Timur 60144</small> 
                    <br>
                    <small class="text-decoration-underline">surabaya@idhamperkasa.com</small>
                    <br>
                    <small class="">0812 3456 7890</small>
                </div>
                <div class="address">
                    <h6>Balikpapan</h6>
                    <small>Jl. AMD Gn. Empat RT. 14 No. 14 Kel. Margomulyo, Kec. Balikpapan Barat, Kota Balikpapan, Kalimantan Timur</small>
                    <br>
                    <small class="text-decoration-underline">balikapan@idhamperkasa.com</small>
                    <small class="">0812 3456 7890</small>
                </div>
            </div>
        </div>
    </div>
</footer>