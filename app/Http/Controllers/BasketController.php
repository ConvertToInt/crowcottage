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
        if (Cookie::has('basket')){ // can this be replaced with 'if cookie exists'
            return view('order.show', [
                'products' => $this->get_basket_products($request),
                'total' => $this->get_total_price($request)
            ]);
        } else {
            return view('order.show');
        }
    }

    public function cookie_set(Product $product)
    {
        $response = new Response('You have successfully added a product');
        $product_without_total = array('products' => array($product));
        $product_without_total['total'] = $product->price;

        $product_with_total = json_encode($product_without_total);
        return $response->withCookie(cookie('basket', $product_with_total));
    }

    public function product_toggle(Product $product)
    {
        if (Cookie::has('basket')){
            $product_ids = array_column($this->get_basket_products(), 'id'); // Collects the Id's of the products
            if (array_search($product->id, $product_ids) !== false){ // Checks if the product is in the basket
                $response = $this->remove_from_basket($product); // If the product is found, remove it
            } else {
                $response = $this->add_to_basket($product); // Otherwise, add it
            }
        } else { // If no basket is found, the basket cookie is set
            $response = $this->cookie_set($product);
        }

        return $response;
    }

    public function remove_from_basket(Product $product)
    {   
        $basket = json_decode(Cookie::get('basket'));
        $product_ids = array_column($basket->products, 'id');

        if (($key = array_search($product->id, $product_ids)) !== null){
            unset($basket->products[$key]);
            $basket->products = array_values($basket->products);
            $basket->total = $basket->total - $product->price;
        }

        $response = new Response('You have successfully removed a product');
        return $response->withCookie(cookie('basket', json_encode($basket)));
    }

    public function add_to_basket(Product $product)
    {
        $basket = json_decode(Cookie::get('basket'));

        $basket->total = $basket->total + $product->price;
        array_push($basket->products, $product);

        $response = new Response('You have successfully added a product');
        return $response->withCookie(cookie('basket', json_encode($basket)));
    }
}
