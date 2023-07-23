<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $title      = 'Category';
        $companies  = Company::get();
        $categories = Category::get();

        return view('dashboard.category', compact('title', 'companies', 'categories'));
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        notify()->success('Kategori Berhasil Ditambahkan!', 'Success!');

        return redirect()->route('category');
    }

    public function delete($id)
    {
        $category = Category::firstwhere('id', $id);
        $category->delete();

        notify()->success('Kategori Dihapus!', 'Success!');

        return redirect()->route('category');        
    }
}
