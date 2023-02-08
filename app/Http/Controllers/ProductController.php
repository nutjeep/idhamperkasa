<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

    public function show (Product $product)
    {
        $path = storage_path() . '/json/navbar.json';
        $json = json_decode(file_get_contents($path), true);
        $nav_item = $json['navbar'];

        return view('product', [
            'title'         => $product->product_name,
            'categories'    => Category::all(),
            'contacts'      => Contact::all(),
            'product'       => $product,
            'galleries'     => $product->gallery,
            'nav_item'      => $nav_item
        ]);
    }
}
