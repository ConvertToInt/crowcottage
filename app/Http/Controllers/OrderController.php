<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use App\Models\Product;
use App\Models\Order;
use App\Models\Address;
use App\Models\Sale;
use Stripe;
use App\Helpers\Helper;
use stdClass;

class OrderController extends Controller
{ 
  
    public function create(Request $request) // create order
    {
        $request->session()->forget('order_details');
        return view('order.create');
    }

    public function review(Request $request)
    {
        if(isset($request->same_as_billing)){
            $shipping_details = $this->validate_shipping_details($request);
            $shipping_details['same_as_billing'] = $request->same_as_billing;
            $request->session()->put('order_details', $shipping_details);
        } else{
            $shipping_billing_details = $this->validate_shipping_billing_details($request);
            $request->session()->put('order_details', $shipping_billing_details);
        }
        
        $order_details = session()->get('order_details');

        return view('review', [
            'order_details'=>$order_details,
            'products'=>$this->get_basket_products(),
            'total'=>$this->get_total()
        ]);
    }

    public function validate_shipping_details($request)
    {
        $shipping_details = $request->validate([
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

        return $shipping_details;
    }

    public function validate_shipping_billing_details($request)
    {
        $shipping_billing_details = $request->validate([
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
            'shipping_postcode' => 'required|max:12',
            'billing_firstname' => 'required|max:25',
            'billing_surname' => 'required|max:25',
            'billing_company' => 'max:50',
            'billing_phone' => 'required', //should be validated as a phone number
            'billing_address' => 'required|max:30',
            'billing_apartment' => 'max:30',
            'billing_city' => 'required|max:30',
            'billing_country' => 'required|max:30',
            'billing_province' => 'max:30',
            'billing_postcode' => 'required|max:12'
        ]);

        return $shipping_billing_details;
    }

    public function payment()
    {
        return view('payment', [
            'total'=>$this->get_total_price()
        ]);
    }

    public function stripe_request(Request $request)
    {
        if($this->check_if_sold() == true){
            return redirect('/basket')->with('status', 'One or more items in your basket have already been sold.');
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $this->get_total_price($request) * 100,
                "currency" => "gbp",
                "source" => $request->stripeToken,
                "description" => "Purchase from crowcottage.co.uk",
        ]);

        $this->store_order_details();
           
        return view('success');
    }

    public function store_order_details()
    {
        $order_details = session()->get('order_details');
        $products = $this->get_basket_products();

        $order = new Order;
        $order->email = $order_details['email'];
        $order->shipping_address_id = $this->store_shipping_details($order_details);
        if (isset($order_details['same_as_billing']))
        {
            $order->billing_address_id = $this->store_billing_details($order_details);
        } else {
            $order->billing_address_id = $order->shipping_address_id;
        }
        $order->total_price = $this->get_total_price();
        $order->save();

        $this->store_sale($products, $order->id);
        
        foreach ($products as $product){
            app('App\Http\Controllers\BasketController')->remove_from_basket($product);
        }
        
        return view('success');
    }

    public function store_shipping_details($order_details)
    {
        $shipping = new Address;
        $shipping->firstname = $order_details['shipping_firstname'];
        $shipping->surname = $order_details['shipping_surname'];
        $shipping->company = $order_details['shipping_company'];
        $shipping->phone = $order_details['shipping_phone'];
        $shipping->address = $order_details['shipping_address'];
        $shipping->apartment = $order_details['shipping_apartment'];
        $shipping->city = $order_details['shipping_city'];
        $shipping->country = $order_details['shipping_country'];
        $shipping->province = $order_details['shipping_province'];
        $shipping->postcode = $order_details['shipping_postcode'];
        $shipping->save();

        return $shipping->id;
    }

    public function store_billing_details($order_details)
    {
        $billing = new Address;
        $billing->firstname = $order_details['billing_firstname'];
        $billing->surname = $order_details['billing_surname'];
        $billing->company = $order_details['billing_company'];
        $billing->phone = $order_details['billing_phone'];
        $billing->address = $order_details['billing_address'];
        $billing->apartment = $order_details['billing_apartment'];
        $billing->city = $order_details['billing_city'];
        $billing->country = $order_details['billing_country'];
        $billing->province = $order_details['billing_province'];
        $billing->postcode = $order_details['billing_postcode'];
        $billing->save();

        return $billing->id;
    }

    public function store_sale($products, $order_id)
    {
        foreach ($products as $product){
            $sale = new Sale;
            $sale->order_Id = $order_id;
            $sale->product_id = $product->id;
            $sale->save();
        }
    }

    public function check_if_sold()
    {
        $products = $this->get_basket_products();

        foreach ($products as $product){
            if ($product->is_sold()){
                return true;
            }
        }

        return false;
    }
}
