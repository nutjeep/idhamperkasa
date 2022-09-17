<?php

use App\Models\About;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardProductController;

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


// <============ Backend ============ >
Route::get('/login', function() {
    return view('backend.login');
});

Route::get('/register', function() {
    return view('backend.register');
});

Route::get('/dashboard', function(){
    return view('backend.dashboard', [
        'title'     => 'Dashboard | Idham Perkasa',
        'abouts'    => About::all()
    ]);
});

Route::get('/dashboard/{about:id}/edit', function(){
    return view('backend.edit', [
        'title'     => 'Dashboard | Idham Perkasa',
        'abouts'    => About::all()
    ]);
});

Route::resource('/dashboard/product', DashboardProductController::class);

Route::get('/dashboard/category', function(){
    return view('backend.category', [
        'title'     => 'Category | Idham Perkasa',
        'categories'    => Category::all()
    ]);
});

Route::get('{product:slug}', [ProductController::class, 'show']);
// Route::get('/{product:slug}', function(Product $product) {
//     return view([
//         'title'     => $product->product_name,
//         'product'   => $product
//     ]);
// });