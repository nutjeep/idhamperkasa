<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Company;
use App\Models\Category;
use App\Models\PhotoProduct;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index (Product $product) 
    {
        $title      = "Idham Perkasa";
        $sliders    = Slider::get();
        $companies  = Company::with('product', 'companyDetail')->get();
        $products   = Product::with('company', 'category')->get();
        $categories = Category::with('product')->get();

        return view('home', compact(
            'title', 'sliders', 'companies', 'categories', 'products'
        ));
    }

    public function company ($slug) 
    {
        $company    = Company::where('slug', $slug)->first();
        $title      = $company->name;
        $companies  = Company::get();
        $sliders    = Slider::get();
        $categories = Category::with('product')->get();
        $products   = Product::get();

        return view('company', compact(
            'company', 'title', 'companies', 'sliders', 'categoriesPt', 'products'
        ));
    }

    public function contact (Product $product)
    {
        $title      = "Contact";
        $sliders    = Slider::get();
        $companies  = Company::get();
        $categories = Category::with('product')->get();
        $products   = Product::get();

        return view('contact', compact(
            'title', 'sliders', 'companies', 'categories', 'products'
        ));
    }

    public function product ($slug)
    {
        $product        = Product::where('slug', $slug)->first();
        $title          = $product->name;
        $sliders        = Slider::get();
        $companies      = Company::get();
        $categories     = Category::with('product')->get();
        $photoProduct   = PhotoProduct::where('product_id', $product->id)->get();

        return view('product', compact(
            'product', 'title', 'sliders', 'companies', 'categories', 'photoProduct'
        ));
    }
}
