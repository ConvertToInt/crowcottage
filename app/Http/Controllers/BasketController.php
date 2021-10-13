<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;

class BasketController extends Controller
{
    public function show(Request $request)
    {
        $products = json_decode($request->cookie('basket'));

        return view('order.show', [
            'products' => $products,
            'total' => $this->calculate_total_price($products)
        ]);
    }

    public function toggleProduct(Request $request, Product $product){

        $products = json_decode($request->cookie('basket'));
  
        if ($request->cookie('basket')){
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
      $response->withCookie(cookie('basket', $product));
      return $response;
   }


    public function removeProduct($products, $product)
    {
        $product_ids = array_column($products, 'id');
        
        if (($key = array_search($product->id, $product_ids)) !== null){
            unset($products[$key]);
            $products = array_values($products);
        }

        $products = json_encode($products);
        $response = new Response('You have successfully removed a product');
        $response->withCookie(cookie('basket', $products));
        return $response;
    }

    public function addToProducts($products, $product)
    {
        $product = array($product);
        $products = json_encode(array_merge($products, $product));
        $response = new Response('You have successfully added a product');
        $response->withCookie(cookie('basket', $products));
        return $response;
    }
}
