<?php

use App\Models\About;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardProductController;

Route::get('/', function(){
    return view('home', [
        "title"  => "IDHAM PERKASA",
        "abouts"  => About::all(),
        "products" => Product::all(),
        "categories" => Category::all(),
        "sliders"   => Slider::all()
    ]);
});

Route::get('/company', function(){
    return view('company', [
        "title"     => 'Profile | IDHAM PERKASA',
        "abouts"    => About::all(),
        "products"  => Product::all(),
        "categories"=> Category::all()
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
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', function() {
    return view('backend.register');
});

Route::get('/dashboard', function(){
    return view('backend.dashboard', [
        'title'     => 'Dashboard | Idham Perkasa',
        'abouts'    => About::all()
    ]);
})->middleware('auth');

Route::get('/dashboard/{about:id}/edit', [AboutController::class, 'edit'])->middleware('auth');
Route::get('/dashboard/{about:id}/show', [AboutController::class, 'show'])->middleware('auth');
Route::put('/dashboard/{about}', [AboutController::class, 'update']);

// Route::get('/dashboard/product', [DashboardProductController::class, 'index'])->middleware('auth');
// Route::get('/dashboard/product/{product:id}/edit', [DashboardProductController::class, 'edit'])->middleware('auth');
// Route::put('/dashboard/product/{product:id}', [DashboardProductController::class, 'update'])->middleware('auth');
// Route::delete('/dashboard/product/{product:id}', [DashboardProductController::class, 'destroy'])->middleware('auth');
Route::resource('/dashboard/product', DashboardProductController::class)->middleware('auth');
Route::delete('/dashboard/product/gallery/{gallery:id}', [DashboardProductController::class, 'delete_gallery'])->middleware('auth');

Route::get('/dashboard/category', [CategoryController::class, 'index'])->middleware('auth');
Route::post('/dashboard/category',[CategoryController::class, 'store']); 
Route::delete('/dashboard/category/{category:id}',[CategoryController::class, 'destroy']); 

Route::get('/dashboard/slider', [SliderController::class, 'index'])->middleware('auth');
Route::post('/dashboard/slider', [SliderController::class, 'store'])->middleware('auth');
Route::delete('/dashboard/slider/{slider:id}',[SliderController::class, 'destroy']); 

Route::get('{product:slug}', [ProductController::class, 'show']);