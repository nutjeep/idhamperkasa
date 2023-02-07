<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index () 
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
            "nav_item"      => $nav_item
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
            "nav_item"      => $nav_item
        ]);
    }
}
