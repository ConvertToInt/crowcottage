<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use App\Models\Product;
use App\Models\Order;
use App\Models\Address;
use Stripe;
use App\Helpers\Helper;

class OrderController extends Controller
{ 
  
    public function create(Request $request) // create order
    {
        return view('order.create');
    }

    public function review(Request $request)
    {
        $this->validate_order_details($request);

        $products = json_decode($request->cookie('order'));

        return view('review', [
            'request'=>$request,
            'products'=>$products,
            'total'=>$this->calculate_total_price($products)
        ]);
    }

    public function payment(Request $request)
    {
        $products = json_decode($request->cookie('order'));

        return view('payment', [
            'total'=>$this->calculate_total_price($products)
        ]);
    }

    public function validate_order_details($request)
    {
        $request->validate([
            'email' => 'required|email',
            'shipping_firstname' => 'required|max:25',
            'shipping_surname' => 'required|max:25',
            'shipping_company' => 'max:50',
            'shipping_phone' => 'required', //should be validated as a phone number
            'shipping_address' => 'required|max:30',
            'shipping_apartment' => 'max:30',
            'shipping_city' => 'required|max:30',
            'shipping_country' => 'required|max:30',
            'shipping_province' => 'max:30',
            'shipping_postcode' => 'required|max:12'
        ]);

        if (!$request->billing)
        {
            $request->validate([
                'billing_firstname' => 'required|max:25',
                'billing_surname' => 'required|max:25',
                'billing_company' => 'max:50',
                'billing_email' => 'required|email',
                'billing_phone' => 'required|phone',
                'billing_address' => 'required|max:30',
                'billing_apartment' => 'max:30',
                'billing_city' => 'required|max:30',
                'billing_country' => 'required|max:30',
                'billing_province' => 'max:30',
                'billing_postcode' => 'required|max:12'
            ]);
        }

    }

    public function store_order_details($request) //will be called by ajax if the stripe payment is successful
    {
        $shipping = new Address;
        $shipping->firstname = $request->shipping_firstname;
        $shipping->surname = $request->shipping_surname;
        $shipping->company = $request->shipping_company;
        $shipping->phone = $request->shipping_phone;
        $shipping->address = $request->shipping_address;
        $shipping->apartment = $request->shipping_apartment;
        $shipping->city = $request->shipping_city;
        $shipping->country = $request->shipping_country;
        $shipping->province = $request->shipping_province;
        $shipping->postcode = $request->shipping_postcode;
        $shipping->save();

        if (!$request->billing)
        {
            $billing = new Address;
            $billing->firstname = $request->billing_firstname;
            $billing->surname = $request->billing_surname;
            $billing->company = $request->billing_company;
            $billing->phone = $request->billing_phone;
            $billing->address = $request->billing_address;
            $billing->apartment = $request->billing_apartment;
            $billing->city = $request->billing_city;
            $billing->country = $request->billing_country;
            $billing->province = $request->billing_province;
            $billing->postcode = $request->billing_postcode;
            $billing->save();
        }

        $order = new Order;
        $order->company = $request->email;
        $order->shipping_address_id = $shipping->id;
        if (!$request->billing){
            $order->billing_address_id = $billing->id;
        } else {
            $order->billing_address_id = $shipping->id;
        }
        $order->save();
        
        return view('success');
    }

    public function stripe_request(Request $request)
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

        $this->store_order_details($request);
   
        // Session::flash('success', 'Payment successful!');
           
        return view('success');
    }
}
