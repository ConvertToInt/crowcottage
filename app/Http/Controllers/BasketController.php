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
        // TODO: can this be replaced with 'if cookie exists'?
        if (Cookie::has('basket')){
            return view('order.show', [
                'products' => $this->get_basket_products(),
                'total' => $this->get_total_price()
            ]);
        } else {
            return view('order.show');
        }
    }

    public function product_toggle(Product $product)
    {
        if ($product->is_sold()){
            return('This product is not available');
        } else {
            if (Cookie::has('basket')){
                $product_ids = array_column($this->get_basket_products(), 'id'); // Collects the Id's of the products
                if (array_search($product['id'], $product_ids) !== false){ // Checks if the product is in the basket
                    $response = $this->remove_from_basket($product); // If the product is found, remove it
                } else {
                    $response = $this->add_to_basket($product); // Otherwise, add it
                }
            } else { // If no basket is found, the basket cookie is set
                $response = $this->cookie_set($product);
            }
        }

        return $response;
    }

    public function cookie_set(Product $product)
    {
        $basket = array('products' => array($this->minify_product($product)));
        $basket['total'] = $product['price'];

        $response = new Response('You have successfully added a product');
        return $response->withCookie(cookie('basket', json_encode($basket)));
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
        if ($product->is_sold()){
            return('This product is not available');
        } else {
            $basket = json_decode(Cookie::get('basket'));

            $basket->total = $basket->total + $product->price;
            array_push($basket->products, $this->minify_product($product));

            $response = new Response('You have successfully added a product');
            return $response->withCookie(cookie('basket', json_encode($basket)));
        }
    }

    // public function check_if_available($product) check if sold and ..
    // {
    //     if ($product->is_sold()){
    //         return
    //     }
    // }

    /*
     * The purpose of this is to reduce cookie size, by excluding the lengthy description column.
     *
     * @param array $product
     * @return array $product
     */
    public function minify_product($product)
    {
        $product = [
            'id' => $product->id,
            'title' => $product->title,
            'price' => $product->price,
            'img' => $product->primary_thumbnail_img->path
        ];

        return $product;
    }
}
