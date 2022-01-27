<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Date;
use Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminReciept;

class BookingController extends Controller
{

    public function review(Request $request)
    {
        $date = Date::where('id', $request->date_id)->first(); //attach to model
        $class = Classes::where('id', $request->class_id)->first(); //attach to model
        $party = $request->party;
        $total = $party * $class->price_per_block;

        // dd($class);

        $booking_details = "add all them together"; //date id, class id, spaces?

        return view('booking.review', [
            'date'=>$date,
            'class'=>$class,
            'party'=>$party,
            'total'=>$total
        ]);
    }

    public function payment(Request $request)
    {   
        return view('booking.payment', [
            'total'=>$this->get_total_price()
        ]);

    }

    public function stripe_request(Request $request)
    {
        $class = "";
        $date = "";
        $booking_details = "";

        if($this->check_if_full($date) == true){
            return redirect('/basket')->with('status', 'One or more items in your basket have already been sold.');
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $this->get_total_price($request) * 100,
                "currency" => "gbp",
                "source" => $request->stripeToken,
                "description" => "Booking from crowcottage.co.uk",
        ]);

        $this->store_order_details($class, $date, $booking_details);
        $this->customer_reciept($class, $date, $booking_details);
        $this->admin_reciept($class, $date, $booking_details);
           
        return view('success', [
            'date'=>$date,
            'class'=>$class,
            'booking_details'=>$booking_details
        ]);
    }

    public function check_if_full($date)
    {

    }

    public function store_booking_details($class, $date, $booking_details)
    {
        // take payment

        // add name, phone, email, class_id, date_id to 'booking' table

        // -* from 'spaces'

        // send confirmation email

        // return to classes with success
    }

    public function customer_reciept($class, $date, $booking_details)
    {

    }

    public function admin_reciept($class, $date, $booking_details)
    {

    }
}
