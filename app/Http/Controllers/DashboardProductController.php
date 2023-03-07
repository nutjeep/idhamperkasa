<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product.product', [
            'title'     => 'Product | Dashboard',
            'products'  => Product::paginate(2),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create', [
            'title'         => 'Add new product',
            'categories'    => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id'   => 'required',
            'product_name'  => 'required|max:255',
            'slug'          => 'required|unique:products|max:255',
            'catalog'       => 'image|file|max:500',
        ]);

        if($request->file('catalog')) {
            $validatedData['catalog'] = $request->file('catalog')->store('profile-images');
        }

        $create = Product::create($validatedData);

        if ($request->has('gallery')) {
            foreach($request->file('gallery') as $gall) {
                $gallery_name = $gall->getClientOriginalName().'.'.strtolower($gall->getClientOriginalExtension());
                $upload_path = 'storage/gallery-images/';
                $gall->move($upload_path, $gallery_name);

                Gallery::create([
                    'product_id'    => $create->id,
                    'gallery'       => $gallery_name
                ]);
            }
        }

        return redirect('/dashboard/product')->with('success', 'New product has been added'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.product.edit', [
            'title'         => 'Edit | Product',
            'product'       => $product,
            'categories'    => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            "category_id"   => "required",
            "product_name"  => "required|max:255",
            'catalog'       => 'image|file|max:500',
        ];

        if($request->slug != $product->slug) {
            $rules["slug"] = "required|unique:products|max:255";
        }

        $validatedData = $request->validate($rules);

        if($request->file('catalog')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['catalog'] = $request->file('catalog')->store('catalog-images');
        }

        $update = Product::where('id', $product->id)->update($validatedData);

        // Gallery images
        if ($request->hasFile('gallery')) {           
            foreach($request->file('gallery') as $gall) {
                $gallery_name = $gall->getClientOriginalName().'.'.strtolower($gall->getClientOriginalExtension());
                $request["product_id"] = $product->id;
                $request["gallery"] = $gallery_name;
                $upload_path = 'storage/gallery-images/';
                $gall->move($upload_path, $gallery_name);

                Gallery::create([
                    'product_id'    => $product->id,
                    'gallery'       => $gallery_name
                ]);
            }
        }
                
        return redirect('/dashboard/product')->with('updated', 'Product has been updated');
    }

    public function delete_gallery($id)
    {
        $gallery = Gallery::findOrFail($id);
        if(File::exists("storage/gallery-images/".$gallery->gallery)) {
            File::delete("storage/gallery-images/".$gallery->gallery);
        }
        
        Gallery::find($id)->delete();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->catalog) {
            Storage::delete($product->catalog);
        }

        $galleries = Gallery::where('product_id', $product->id)->get();
        foreach($galleries as $gall) { 
            if(File::exists("storage/gallery-images/".$gall->gallery)) {
                File::delete("storage/gallery-images/".$gall->gallery);
            }
            Gallery::destroy($galleries);
        }

        if (!empty($product_gallery)) {
            Product::destroy([
                $product->id,
                $product->gallery
            ]);
        } else {
            Product::destroy([
                $product->id,
            ]);
        }
        return redirect('/dashboard/product')->with('deleted', 'Product has been deleted'); 
    }
}