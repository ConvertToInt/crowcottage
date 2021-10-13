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
        if ($request->cookie('basket')){
            $products = json_decode($request->cookie('basket'));
            $contains = $product->searchArray($products, $product);

            return view ('products.show', [
                'product'=>$product,
                'contains'=>$contains
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
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'body' => 'required|max:64000',
        //     'img' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        // ]);

        $product = new Product;
        $product->img = $request->file('img')->store('products', 'public');
        $product->title = $request->title;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->save();
         
        return back()->with('success', 'Product Created');
    }

    public function delete(Product $product)
    {
        Storage::Delete($product->img);
        $product->delete();

        $products = product::get();

        return view ('products.index', [
            'products'=>$products
        ]);
    }
    
}
