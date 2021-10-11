<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;

class BasketController extends Controller
{
    public function show(Request $request)
    {
        $products = json_decode($request->cookie('order'));
        $total = 0; //can this be set globally?

        foreach ($products as $product){
            $total = $total + $product->price;
        }

        return view('order.show', [
            'products' => $products,
            'total' => $total
        ]);
    }

    public function toggleProduct(Request $request, Product $product){

        $products = json_decode($request->cookie('order'));
  
        if ($request->cookie('order')){
           $contains = $product->searchArray($products, $product);
           if ($contains == 1){
              $response = $this->removeProduct($products, $product);
           } else {
              $response = $this->addToProducts($products, $product);
           }
        } else {
           $response = $this->addproduct($product);
        }
       
        return $response;
    }

    public function addProduct($product)
   {
      $response = new Response('You have successfully added a product');
      $product = json_encode(array($product));
      $response->withCookie(cookie('order', $product));
      return $response;
   }


    public function removeProduct($products, $product) //this no longer works as i am using an array of objects instead of an array of ID's.
    {
        $product_ids = array_column($products, 'id');
        // $key = 0;

        // foreach ($product_ids as $product_id){
        //     if($product_id == $product->id){
        //        unset($products[$key]);
        //        $products = array_values($products);
        //     }
        //     $key = $key + 1;
        // }
        
        if (($key = array_search($product->id, $product_ids)) !== null){
            unset($products[$key]);
            $products = array_values($products);
        }

        $products = json_encode($products);
        $response = new Response('You have successfully removed a product');
        $response->withCookie(cookie('order', $products));
        return $response;
    }

    public function addToProducts($products, $product)
    {
        $product = array($product);
        $products = json_encode(array_merge($products, $product));
        $response = new Response('You have successfully added a product');
        $response->withCookie(cookie('order', $products));
        return $response;
    }
}
