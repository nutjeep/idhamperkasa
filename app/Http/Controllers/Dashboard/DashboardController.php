<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title      = 'Dashboard';
        $companies  = Company::get();
        $categories = Category::get();
        $productsPT = Product::where('company_id', '1')->get();
        $productsCV = Product::where('company_id', '2')->get();

        return view('dashboard.dashboard', compact(
            'title', 'companies', 'categories', 'productsPT', 'productsCV'
        ));
    }
}
