<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use App\Models\Product;
use App\Models\Order;
use Stripe;

class OrderController extends Controller
{  
    
    public function create(Request $request) // create order
    {
        return view('order.create');
    }

    public function review(Request $request)
    {
        // validate shipping/ billing, if error then go back.

        $products = json_decode($request->cookie('order'));
        $total = 0; 

        foreach ($products as $product){
            $total = $total + $product->price;
        }

        return view('review', [
            'request'=>$request,
            'products'=>$products,
            'total'=>$total
        ]);
    }

    public function payment(Request $request)
    {
        $products = json_decode($request->cookie('order'));
        $total = 0; 

        foreach ($products as $product){
            $total = $total + $product->price;
        }

        return view('payment', [
            'total'=>$total
        ]);
    }

    public function store()
    {
        // purchase()
        // 
        // if success then ->
        //
        // store shipping details
        // 
        // if (sameasshipping == false){
        //    store billing details
        // }
        //
        // go to success page with items
    }

    public function stripe(Request $request)
    {

        $products = json_decode($request->cookie('order'));
        $total = 0; 

        foreach ($products as $product){
            $total = $total + $product->price;
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "gbp",
                "source" => $request->stripeToken,
                "description" => "Purchase from crowcottage.co.uk",
        ]);
   
        // Session::flash('success', 'Payment successful!');
           
        return view('success');
    }
}
