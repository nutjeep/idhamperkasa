<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index () {
        return view('backend.category', [
            'title'     => 'Category | Idham Perkasa',
            'categories'    => Category::all()
        ]);
    }

    public function store (Request $request) {
        $validatedData = $request->validate([
            'category_name' => 'required|max:255'
        ]);

        // return $request;

        Category::create($validatedData);
        return redirect('/dashboard/category')->with('success', 'New category has been added');
    }

    public function destroy (Category $category) {

        Category::destroy($category->id);
        return redirect('/dashboard/category')->with('delete', 'Category has been deleted');
    }
}
