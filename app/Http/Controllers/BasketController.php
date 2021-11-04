<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class BasketController extends Controller
{
    public function show(Request $request)
    {
        if (!empty($this->get_basket_products($request))){
            return view('order.show', [
                'products' => $this->get_basket_products($request),
                'total' => $this->get_total_price($request)
            ]);
        } else {
            return view('order.show');
        }
    }

    public function cookie_set()
    {
        $array = array('products' => array());
        $array['total'] = '';
        $cookie = json_encode($array);
        Cookie::make('basket', $cookie);
        return;
    }

    public function product_toggle(Request $request, Product $product)
    {
        if (Cookie::has('basket')){
            $product_ids = array_column($this->get_basket_products($request), 'id'); // Collects the Id's of the products
            if (array_search($product->id, $product_ids) !== false){ // Checks if the product is in the basket
                $response = $this->remove_from_basket($request, $product); // If the product is found, remove it
            } else {
                $response = $this->add_to_basket($request, $product); // Otherwise, add it
            }
        } else { // If no basket is found, an empty basket is created, then the product is added
            $this->cookie_set();
            $response = $this->add_to_basket($request, $product);
        }

        return $response;
    }

    public function remove_from_basket(Request $request, Product $product)
    {   
        $basket = json_decode($request->cookie('basket'));
        $product_ids = array_column($basket->products, 'id');

        if (($key = array_search($product->id, $product_ids)) !== null){
            unset($basket->products[$key]);
            $basket->products = array_values($basket->products);
            $basket->total = $basket->total - $product->price;
        }

        $response = new Response('You have successfully removed a product');
        return $response->withCookie(cookie('basket', json_encode($basket)));
    }

    public function add_to_basket(Request $request, Product $product)
    {
        $basket = json_decode($request->cookie('basket'));

        $basket->total = $basket->total + $product->price;
        array_push($basket->products, $product);

        $response = new Response('You have successfully added a product');
        return $response->withCookie(cookie('basket', json_encode($basket)));
    }
}
