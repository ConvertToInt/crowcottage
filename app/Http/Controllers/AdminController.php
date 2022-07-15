<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Classes;
use App\Models\Sale;
use App\Models\Order;
use App\Models\Addresses;
use App\Models\Booking;
use App\Models\Date;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function panel()
    {
        return view ('admin.panel');
    }

    public function classes_index()
    {
        $classes = Classes::get();

        return view ('admin.classes', [
            'classes'=>$classes
        ]);

    }

    public function products_index()
    {
        $products = Product::get();

        return view ('admin.products', [
            'products'=>$products
        ]);

    }

    public function bookings_index()
    {
        $date = Date::where('date', Carbon::now()->format('Y-m-d'))->first();
        $dates = Date::get();
        $bookings = Booking::where('date_id', $date->id)->paginate(10);

        return view ('admin.bookings', [
            'bookings'=>$bookings,
            'dates'=>$dates
        ]);

    }

    public function orders_index()
    {
        $orders = Order::with('sales', 'shipping_address', 'billing_address')->paginate(10);

        return view ('admin.orders', [
            'orders'=>$orders,
        ]);
    }

    public function shipping_charge(Order $order, Request $request)
    {   
        $order->shipping_charge = $request->shipping_charge;
        $order->save();

        return back();
    }
}
