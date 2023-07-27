<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PhotoProduct;

class ProductController extends Controller
{
    public function indexPt()
    {
        $title      = 'Product';
        $company    = 'PT. Idham Sapta Perkasa';
        $products   = Product::where('company_id', '1')->latest()->get();
        $categories = Category::get();
        $route      = route('store.product.pt');

        return view('dashboard.product.product', compact(
            'title', 'company', 'products', 'categories', 'route'
        ));
    }

    public function storeProductPt(Request $request)
    {
        $product                = new Product;
        $product->category_id   = $request->category_id;
        $product->company_id    = '1';
        $product->name          = $request->name;
        $product->slug          = Str::slug($request->name);
        $product->description   = $request->description;
        $product->save();

        // $request->validate([
        //     'img_name'  => 'required|max:300'
        // ]);

        foreach($request->file('img_name') as $imagefile){
            $path               = $imagefile->store('product-images');
            $photo              = new PhotoProduct;
            $photo->product_id  = $product->id;
            $request->validate([
            'img_name'  => 'required|max:300'
            ]);
            $photo->img_name    = $path;
            $photo->save();
        }

        notify()->success('Produk Berhasil Ditambahkan', 'Success!');
        return redirect()->route('product.pt');
    }

    public function indexCv()
    {
        $title      = 'Product';
        $company    = 'CV. Idham Perkasa';
        $products   = Product::where('company_id', '2')->latest()->get();
        $categories = Category::get();
        $route      = route('store.product.cv');

        return view('dashboard.product.product', compact(
            'title', 'company', 'products', 'categories', 'route'
        ));
    }

    public function storeProductCv(Request $request)
    {
        $product                = new Product;
        $product->category_id   = $request->category_id;
        $product->company_id    = '2';
        $product->name          = $request->name;
        $product->slug          = Str::slug($request->name);
        $product->save();

        // $request->validate([
        //     'img_name'  => 'required|max:300'
        // ]);

        foreach($request->file('img_name') as $imagefile){
            $path               = $imagefile->store('product-images');

            $photo              = new PhotoProduct;
            $photo->product_id  = $product->id;
            $photo->img_name    = $path;
            $photo->save();
        }

        notify()->success('Produk Berhasil Ditambahkan', 'Success!');
        return redirect()->route('product.cv');
    }
    
    public function edit($slug)
    {
        $title          = 'Edit Product';
        $product        = Product::where('slug', $slug)->first();
        $categories     = Category::get();
        $photoProduct   = PhotoProduct::where('product_id', $product->id)->get();

        return view('dashboard.product.edit', compact('title', 'product', 'categories', 'photoProduct'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name'          => 'required',
            'slug'          => 'unique:products,slug',
            'category_id'   => 'required',
            'description'   => ''
        ]);

        $product               = Product::where('slug', $slug)->first();
        $product->name         = $request->name;
        $product->slug         = Str::slug($request->name);
        $product->category_id  = $request->category_id;
        $product->description  = $request->description;
        $product->save();

        notify()->success('Produk Berhasil Diubah', 'Success!');
        return redirect()->back();
    }

    public function delete($id)
    {
        $product = Product::firstwhere('id', $id);
        $photoProduct = PhotoProduct::where('product_id', $id)->get();

        foreach($photoProduct as $photo) {
            unlink('storage/' . $photo->img_name);
            $photo->delete();
        }

        $product->delete();

        notify()->success('Produk Berhasil Dihapus', 'Success!');
        return redirect()->route('product.pt');
    }

    public function storePhoto(Request $request)
    {
        foreach($request->file('img_name') as $imagefile){
            $path               = $imagefile->store('product-images');

            $photo              = new PhotoProduct;
            $photo->product_id  = $request->product_id;
            $photo->img_name    = $path;
            $photo->save();
        }

        notify()->success('Foto Berhasil Ditambahkan', 'Success!');
        return redirect()->back();
    }

    public function deletePhoto($id)
    {
        $photoProduct = PhotoProduct::firstwhere('id', $id);
        unlink('storage/' . $photoProduct->img_name);
        $photoProduct->delete();

        notify()->success('Foto Berhasil Dihapus', 'Success!');
        return redirect()->back();
    }
}
