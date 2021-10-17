<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;

class BasketController extends Controller
{
    public function show(Request $request)
    {
        $basket = json_decode($request->cookie('basket'));

        if (!empty($basket)){
            return view('order.show', [
                'products' => $basket->products,
                'total' => $basket->total
            ]);
        } else {
            return view('order.show');
        }
        
    }

    public function toggleProduct(Request $request, Product $product){

        $basket = json_decode($request->cookie('basket'));
  
        if (!empty($basket->products)){
            // $contains = $product->searchArray($basket->products, $product); // can this be replaced with in_array()?
            $product_ids = array_column($basket->products, 'id');
           if (array_search($product->id, $product_ids) !== false){
              $response = $this->removeProduct($basket, $product, $product_ids);
           } else {
              $response = $this->addToProducts($basket, $product);
           }
        } else {
           $response = $this->addproduct($product);
        }
       
        return $response;
    }

    public function addProduct($product)
   {
      $response = new Response('You have successfully added a product');
      $product_without_total = array('products' => array($product));
      $product_without_total['total'] = $product->price;

      $product_with_total = json_encode($product_without_total);
      return $response->withCookie(cookie('basket', $product_with_total));
   }


    public function removeProduct($basket, $product, $product_ids)
    {
        $product_ids = array_column($basket->products, 'id');
        
        if (($key = array_search($product->id, $product_ids)) !== null){
            unset($basket->products[$key]);
            $basket->products = array_values($basket->products);
            $basket->total = $basket->total - $product->price;
        }

        $response = new Response('You have successfully removed a product');
        return $response->withCookie(cookie('basket', json_encode($basket)));
    }

    public function addToProducts($basket, $product)
    {
        $basket->total = $basket->total + $product->price;
        array_push($basket->products, $product);

        $response = new Response('You have successfully added a product');
        return $response->withCookie(cookie('basket', json_encode($basket)));
    }
}
