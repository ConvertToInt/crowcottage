<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\ProductPhoto;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('thumbnail_img', 'secondary_img')->orderBy('created_at','desc')->get();

        return view ('products.index', [
            'products'=>$products
        ]);
    }

    public function show(Request $request, Product $product)
    {
        $basket = json_decode($request->cookie('basket'));

        if (!empty($basket)){
            $key = array_search($product->id, array_column($basket->products, 'id'));

            return view ('products.show', [
                'product'=>$product,
                'key'=>$key
            ]);
        } else {
            return view ('products.show', [
                'product'=>$product
            ]);
        }
    }

    public function create()
    {
        return view ('products.create');
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->height = $request->height . $request->height_units;
        $product->width = $request->width . $request->width_units;
        $product->url = $request->url;
        $product->save();

        $product_thumbnail_img = new ProductPhoto;
        $product_thumbnail_img->product_id = $product->id;
        $product_thumbnail_img->path = $request->thumbnail_img->store('products', 'public');
        $product_thumbnail_img->is_thumbnail = '1';
        $product_thumbnail_img->save();

        $product_secondary_img = new ProductPhoto;
        $product_secondary_img->product_id = $product->id;
        $product_secondary_img->path = $request->secondary_img->store('products', 'public');
        $product_thumbnail_img->is_thumbnail = '0';
        $product_secondary_img->save();

        // if($request->photos){
        //     foreach ($request->photos as $photo) {
        //         $product_photo = new ProductPhoto;
        //         $product_photo->product_id = $product->id;
        //         $product_photo->path = $photo->store('products', 'public');
        //         $product_photo->save();
        //     }
        // }

        $products = Product::get();
         
        return view('admin.products',[
            'products'=>$products
        ])->with('success', 'Product Created');
    }

    public function delete(Product $product)
    {
        Storage::disk('public')->delete($product->img);
        $product->delete();

        $products = product::get();

        return view ('admin.products', [
            'products'=>$products
        ]);
    }
    
}
