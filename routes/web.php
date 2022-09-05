<?php

use App\Models\About;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;

Route::get('/', function(){
    return view('home', [
        "title"  => "IDHAM PERKASA",
        "abouts"  => About::all(),
        "products" => Product::all(),
        "categories" => Category::all()
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact | IDHAM PERKASA",
        "products" => Product::all(),
        "categories" => Category::all()
    ]);
});

Route::get('{product:slug}',[ProductController::class, 'show']);

// Backend 
Route::get('/login', function() {
    return view('login');
});