<?php

use App\Models\About;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\DashboardProductController;

use Illuminate\Support\Facades\Route;

Route::get('/', [LandingpageController::class, 'index']);
Route::get('/company', [LandingpageController::class, 'company']);
Route::get('/contact', [LandingpageController::class, 'contact']);

// <============ Backend ============>
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/registration', [LoginController::class, 'registration']);

Route::get('/dashboard', function(){
    return view('backend.dashboard', [
        'title'     => 'Dashboard | Idham Perkasa',
        'abouts'    => About::all(),
        'product'   => Product::count(),
        'category'  => Category::count()
    ]);
})->middleware('auth');

Route::get('/dashboard/{about:id}/edit', [AboutController::class, 'edit'])->middleware('auth');
Route::get('/dashboard/{about:id}/show', [AboutController::class, 'show'])->middleware('auth');
Route::put('/dashboard/{about}', [AboutController::class, 'update']);

Route::resource('/dashboard/product', DashboardProductController::class)->middleware('auth');
Route::delete('/dashboard/product/gallery/{gallery:id}', [DashboardProductController::class, 'delete_gallery']);

Route::get('/dashboard/category', [CategoryController::class, 'index'])->middleware('auth');
Route::post('/dashboard/category',[CategoryController::class, 'store'])->middleware('auth'); 
Route::delete('/dashboard/category/{category:id}',[CategoryController::class, 'destroy']); 

Route::get('/dashboard/slider', [SliderController::class, 'index'])->middleware('auth');
Route::post('/dashboard/slider', [SliderController::class, 'store'])->middleware('auth');
Route::delete('/dashboard/slider/{slider:id}',[SliderController::class, 'destroy']); 

Route::get('dashboard/contact', [ContactController::class, 'index'])->middleware('auth');
Route::post('dashboard/contact', [ContactController::class, 'store'])->middleware('auth');
Route::get('dashboard/contact/{contact:id}/edit', [ContactController::class, 'edit'])->middleware('auth');
Route::put('dashboard/contact/{contact:id}', [ContactController::class, 'update'])->middleware('auth');
Route::delete('dashboard/contact/{contact:id}', [ContactController::class, 'delete']);

Route::get('{product:slug}', [ProductController::class, 'show']);