<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Address;
use App\Models\Sale;
use App\Models\Product;
use Stripe;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

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
            'total'=>$this->get_total_price()
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

    public function payment(Request $request)
    {
        $request->session()->put('order_details.delivery_method', $request->delivery_method);
        
        return view('payment', [
            'total'=>$this->get_total_price()
        ]);
    }

    public function stripe_request(Request $request)
    {
        $order_details = session()->get('order_details');
        $products = $this->get_basket_products();

        if($this->check_if_sold($products) == true){
            return redirect('/basket')->with('status', 'One or more items in your basket have already been sold.');
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $this->get_total_price($request) * 100,
                "currency" => "gbp",
                "source" => $request->stripeToken,
                "description" => "Purchase from crowcottage.co.uk",
        ]);

        $this->store_order_details($order_details, $products);
        $this->admin_reciept($order_details, $products);
        // $this->customer_reciept($order_details, $products);

        Cookie::queue(Cookie::forget('basket'));
           
        return view('success', [
            'products'=>$products
        ]);
    }

    public function store_order_details($order_details, $products)
    {
        $order = new Order;
        $order->email = $order_details['email'];
        $order->shipping_address_id = $this->store_shipping_details($order_details);
        if (isset($order_details['same_as_billing']))
        {
            $order->billing_address_id = $order->shipping_address_id;
        } else {
            $order->billing_address_id = $this->store_billing_details($order_details);
        }
        $order->total_price = $this->get_total_price();
        $order->delivery_method = $order_details['delivery_method'];
        $order->save();

        foreach ($products as $product){
            $this->store_sale($product, $order->id);
        }
        
        return $order->id;
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

    public function store_sale($product, $order_id)
    {
        $sale = new Sale;
        $sale->order_Id = $order_id;
        $sale->product_id = $product->id;
        $sale->save();
    }

    public function check_if_sold($products)
    {
        foreach ($products as $product){
            $product = Product::find($product->id);
            if ($product->is_sold()){
                return true;
            }
        }
        return false;
    }

    public function admin_reciept($order_details, $products)
    {
        if (isset($order_details['same_as_billing']))
        {
            Mail::send('email.admin_reciept', array(
                'email' => $order_details['email'],
                'shipping_firstname' => $order_details['shipping_firstname'],
                'shipping_surname' => $order_details['shipping_surname'],
                'shipping_phone' => $order_details['shipping_phone'],
                'shipping_company' => $order_details['shipping_company'],
                'shipping_apartment' => $order_details['shipping_apartment'],
                'shipping_address' => $order_details['shipping_address'],
                'shipping_city' => $order_details['shipping_city'],
                'shipping_country' => $order_details['shipping_country'],
                'shipping_province' => $order_details['shipping_province'],
                'shipping_postcode' => $order_details['shipping_postcode'],
                'delivery_method' => $order_details['delivery_method'],
                'products' => $products,
                'total' => $this->get_total_price(),
                'same_as_billing' => $order_details['same_as_billing']
            ), function($message) use ($order_details){
                $message->from($order_details['email']); //crowcottagearts.co.uk?
                $message->to('crowcottagearts@outlook.com', 'CrowCottage Admin')->subject('New Sale From Crow Cottage');
            }); 
        } else {
            Mail::send('email.admin_reciept', array(
                'email' => $order_details['email'],
                'shipping_firstname' => $order_details['shipping_firstname'],
                'shipping_surname' => $order_details['shipping_surname'],
                'shipping_phone' => $order_details['shipping_phone'],
                'shipping_company' => $order_details['shipping_company'],
                'shipping_apartment' => $order_details['shipping_apartment'],
                'shipping_address' => $order_details['shipping_address'],
                'shipping_city' => $order_details['shipping_city'],
                'shipping_country' => $order_details['shipping_country'],
                'shipping_province' => $order_details['shipping_province'],
                'shipping_postcode' => $order_details['shipping_postcode'],
                'billing_firstname' => $order_details['billing_firstname'],
                'billing_surname' => $order_details['billing_surname'],
                'billing_phone' => $order_details['billing_phone'],
                'billing_company' => $order_details['billing_company'],
                'billing_apartment' => $order_details['billing_apartment'],
                'billing_address' => $order_details['billing_address'],
                'billing_city' => $order_details['billing_city'],
                'billing_country' => $order_details['billing_country'],
                'billing_province' => $order_details['billing_province'],
                'billing_postcode' => $order_details['billing_postcode'],
                'delivery_method' => $order_details['delivery_method'],
                'products' => $products,
                'total' => $this->get_total_price(),
            ), function($message) use ($order_details){
                $message->from($order_details['email']); //crowcottagearts.co.uk?
                $message->to('crowcottagearts@outlook.com', 'CrowCottage Admin')->subject('New Sale From Crow Cottage');
            }); 
            
        }
    }

    // public function customer_reciept()
    // {
    //     Mail::send('email.customer_reciept', array(
    //         'name' => $request->get('name'),
    //         'email' => $request->get('email'),
    //         'phone' => $request->get('phone'),
    //         'subject' => $request->get('subject'),
    //         'form_message' => $request->get('message'),
    //     ), function($message) use ($request){
    //         $message->from($request->email);
    //         $message->to('crowcottagearts@outlook.com', 'CrowCottage Admin')->subject($request->get('subject'));
    //     });
    // }
}
