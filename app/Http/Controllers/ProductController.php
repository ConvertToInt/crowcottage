<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{

    public function index()
    {
        $products = Product::get();

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
        $product->img = $request->file('img')->store('products', 'public');
        $product->title = $request->title;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->url = $request->url;
        $product->save();

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
