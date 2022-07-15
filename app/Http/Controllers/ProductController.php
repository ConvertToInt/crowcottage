<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\Image;
use Intervention;


class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('primary_thumbnail_img', 'secondary_thumbnail_img')->orderBy('created_at','desc')->get();

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
        $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required|max:64000',
            'price' => 'required|numeric',
            'height' => 'required|numeric',
            'width' => 'required|numeric',
            'url' => 'max:64000',
            'primary_img' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'secondary_img' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $product = new Product;
        $product->title = $request->title;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->height = $request->height . $request->height_units;
        $product->width = $request->width . $request->width_units;
        $product->url = $request->url;
        $product->save();

        //PRIMARY IMAGE

        $primary_original_img = new Image;
        $primary_original_img->product_id = $product->id;
        $primary_original_img->path = $request->primary_img->storeAs('products/images', $request->primary_img->getClientOriginalName(), 'public');
        $primary_original_img->is_thumbnail = '0';
        $primary_original_img->position = '1';
        $primary_original_img->save();

        $thumbnailImg = Intervention::make($request->primary_img); // make_thumbnail($primary_img);
        $width = $thumbnailImg->width();
        $height = $thumbnailImg->height();
        $thumbnailImg->width() > $thumbnailImg->height() ? $width=$thumbnailImg->height() : $height=$thumbnailImg->width();
        $thumbnailImg->crop($width, $height);
        $thumbnailImg->save(storage_path() . '/app/public/products/thumbnails/' . $request->primary_img->getClientOriginalName());

        $primary_thumbnail = new Image;
        $primary_thumbnail->product_id = $product->id;
        $primary_thumbnail->path = 'products/thumbnails/' . $request->primary_img->getClientOriginalName();
        $primary_thumbnail->is_thumbnail = '1';
        $primary_thumbnail->position = '1';
        $primary_thumbnail->save();

        //SECONDARY IMAGE

        $secondary_original_img = new Image;
        $secondary_original_img->product_id = $product->id;
        $secondary_original_img->path = $request->secondary_img->storeAs('products/images', $request->secondary_img->getClientOriginalName(), 'public');
        $secondary_original_img->is_thumbnail = '0';
        $secondary_original_img->position = '2';
        $secondary_original_img->save();

        $thumbnailImg = Intervention::make($request->secondary_img); // make_thumbnail($secondary_img);
        $width = $thumbnailImg->width();
        $height = $thumbnailImg->height();
        $thumbnailImg->width() > $thumbnailImg->height() ? $width=$thumbnailImg->height() : $height=$thumbnailImg->width();
        $thumbnailImg->crop($width, $height);
        $thumbnailImg->save(storage_path() . '/app/public/products/thumbnails/' . $request->secondary_img->getClientOriginalName());

        $secondary_thumbnail = new Image;
        $secondary_thumbnail->product_id = $product->id;
        $secondary_thumbnail->path = 'products/thumbnails/' . $request->secondary_img->getClientOriginalName();
        $secondary_thumbnail->is_thumbnail = '1';
        $secondary_thumbnail->position = '2';
        $secondary_thumbnail->save();

        //END

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
