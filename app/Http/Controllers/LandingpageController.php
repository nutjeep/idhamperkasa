<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index (Product $product) 
    {
        $path = storage_path() . '/json/navbar.json';
        $json = json_decode(file_get_contents($path), true);
        $nav_item = $json['navbar']; 

        return view('home', [
            "title"         => "IDHAM PERKASA",
            "abouts"        => About::all(),
            "products"      => Product::all(),
            "categories"    => Category::all(),
            "sliders"       => Slider::all(),
            "contacts"      => Contact::all(),
            "nav_item"      => $nav_item,
            "product"       => $product
        ]);
    }

    public function company () 
    {
        $path = storage_path() . '/json/navbar.json';
        $json = json_decode(file_get_contents($path), true);
        $nav_item = $json['navbar'];

        return view('company', [
            "title"         => 'Profile | IDHAM PERKASA',
            "abouts"        => About::all(),
            "products"      => Product::all(),
            "categories"    => Category::all(),
            "contacts"      => Contact::all(),
            "nav_item"      => $nav_item
        ]);
    }

    public function contact ()
    {
        $path = storage_path() . '/json/navbar.json';
        $json = json_decode(file_get_contents($path), true);
        $nav_item = $json['navbar'];

        return view('contact', [
            "title"         => "Contact | IDHAM PERKASA",
            "products"      => Product::all(),
            "categories"    => Category::all(),
            "contacts"      => Contact::all(),
            "nav_item"      => $nav_item
        ]);
    }

    public function product (Product $product)
    {
        $path = storage_path() . '/json/navbar.json';
        $json = json_decode(file_get_contents($path), true);
        $nav_item = $json['navbar'];

        return view('product', [
            'title'         => $product->product_name,
            'canonical'     => $product->slug,
            'categories'    => Category::all(),
            'contacts'      => Contact::all(),
            'product'       => $product,
            'galleries'     => $product->gallery,
            'nav_item'      => $nav_item
        ]);
    }
}
