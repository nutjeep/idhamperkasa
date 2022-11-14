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
            'title'     => 'Product | Idham Perkasa',
            'products'  => Product::all(),
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
            'catalog'       => 'image|file|max:2048',
        ]);

        if($request->file('catalog')) {
            $validatedData['catalog'] = $request->file('catalog')->store('catalog-images');
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
            'title'         => 'Edit product',
            'product'       => $product,
            'categories'    => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product = Product::findOrFail($product->id);
        $product->category_id = $request->validate(['required']);
        $product->product_name = $request->validate(['required|max:255']);
        $product->catalog = $request->validate(['file|image|max:2048']);

        if($request->slug != $product->slug) {
            $product->slug = $request->validate('required|unique:products');
        }

        if($request->file('catalog')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $request->catalog = $request->file('catalog')->store('catalog-images');
        }
        $product->save();

        // $rules = [
        //     'category_id'   => 'required',
        //     'product_name'  => 'required|max:255',
        //     'catalog'       => 'file|image|max:2048',
        // ];

        // if($request->slug != $product->slug) {
        //     $rules['slug'] = 'required|unique:products';
        // }

        // $validatedData = $request->validate($rules);

        // if($request->file('catalog')) {
        //     if($request->oldImage) {
        //         Storage::delete($request->oldImage);
        //     }
        //     $validatedData['catalog'] = $request->file('catalog')->store('catalog-images');
        // }

        // Product::where('id', $product->id)->update($validatedData);

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
                
        return redirect('/dashboard/product')->with('update', 'Product has been updated');
    }

    public function delete_gallery($id) {
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
    public function destroy(Product $product, Gallery $gall)
    {
        if($product->catalog) {
            Storage::delete($product->catalog);
        }

        $galleries = Gallery::where('product_id', $product->id)->get();
        foreach($galleries as $gall) { 
            if(File::exists("storage/gallery-images/".$gall->gallery)) {
                File::delete("storage/gallery-images/".$gall->gallery);
            }
        }

        Product::destroy([
            $product->id,
            $product->gallery
        ]);

        return redirect('/dashboard/product')->with('delete', 'Product has been deleted');
    }
}
