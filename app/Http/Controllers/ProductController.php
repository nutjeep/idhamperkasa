<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Database\Eloquent\Model;

class ProductController extends Controller
{

    public function show(Product $product)
    {
        return view('product', [
            'title'     => $product->product_name,
            "categories" => Category::all(),
            'product'   => $product
        ]);
    }
}
