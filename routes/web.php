<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\CompanyController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Models\PhotoProduct;

Route::get('/', [LandingpageController::class, 'index'])->name('home');
Route::get('/company/{companies:slug}', [LandingpageController::class, 'company'])->name('company');
Route::get('/contact', [LandingpageController::class, 'contact'])->name('contact');
Route::get('/product/{products:slug}', [LandingpageController::class, 'product'])->name('product');


/* <============ AUTH ============> */
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('authentication');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


/* <============ DASHBOARD ============> */
Route::middleware('auth')->group(function() {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  // -- User 
  Route::get('/dashboard/user', [UserController::class, 'index'])->name('user');
  Route::post('/dashboard/user/update', [UserController::class, 'update'])->name('update.user');

  // -- Category
  Route::get('/dashboard/category', [CategoryController::class, 'index'])->name('category');
  Route::post('/dashboard/category/store', [CategoryController::class, 'store'])->name('store.category');
  Route::delete('/dashboard/category/delete/{id}', [CategoryController::class, 'delete'])->name('delete.category');

  // -- Product
  Route::get('/dashboard/product/pt-idham-s-perkasa', [ProductController::class, 'indexPt'])->name('product.pt');
  Route::post('/dashboard/product/pt-idham-s-perkasa/store', [ProductController::class, 'storeProductPt'])->name('store.product.pt');
  Route::get('/dashboard/product/cv-idham-perkasa', [ProductController::class, 'indexCv'])->name('product.cv');
  Route::post('/dashboard/product/cv-idham-perkasa/store', [ProductController::class, 'storeProductCv'])->name('store.product.cv');
  Route::get('/dashboard/product/edit/{products:slug}', [ProductController::class, 'edit'])->name('edit.product');
  Route::put('/dashboard/product/edit/update/{products:slug}', [ProductController::class, 'update'])->name('update.product');
  Route::delete('/dashboard/product/delete/{id}', [ProductController::class, 'delete'])->name('delete.product');
  Route::post('/dashboard/product/photo/store', [ProductController::class, 'storePhoto'])->name('store.photo.product');
  Route::delete('/dashboard/product/photo/delete/{photo_products:id}', [ProductController::class, 'deletePhoto'])->name('delete.photo.product');
  
  // -- Company
  Route::get('/dashboard/company', [CompanyController::class, 'index'])->name('dashboard.company');
  Route::post('/dashoard/company/{company:slug}', [CompanyController::class, 'update'])->name('update.company');

  // -- Image Slider
  Route::get('/dashboard/image-slider', [SliderController::class, 'index'])->name('image.slider');
  Route::post('/dashboard/image-slider/store', [SliderController::class, 'store'])->name('store.slider');
  Route::put('/dashboard/image-slider/update/{sliders:id}', [SliderController::class, 'update'])->name('update.slider');
  Route::delete('/dashboard/image-slider/delete/{sliders:id}', [SliderController::class, 'destroy'])->name('delete.slider');

  // -- Contact
  Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('dashboard.contact');
});