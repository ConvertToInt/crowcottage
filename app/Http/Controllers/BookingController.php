<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Date;
use App\Models\Booking;
use Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminReciept;
use App\Mail\CustomerReciept;

class BookingController extends Controller
{

    public function review(Request $request)
    {
        $request->session()->forget('order_details');

        $date = Date::where('id', $request->date_id)->first();
        $class = Classes::where('id', $request->class_id)->first();

        $booking_details = [];
        $booking_details['class_id'] = $request->class_id;
        $booking_details['date_id'] = $request->date_id;
        $booking_details['party'] = $request->party;
        $booking_details['total'] = $request->party * $class->price_per_block;

        $request->session()->put('booking_details', $booking_details);

        return view('booking.review', [
            'date'=>$date,
            'class'=>$class,
            'booking_details'=>$booking_details
        ]);
    }

    public function payment(Request $request)
    {  
        $booking_details = session()->get('booking_details');

        //VALIDATE INPUT
        $booking_details['name'] = $request->name;
        $booking_details['email'] = $request->email;
        $booking_details['phone'] = $request->phone;

        $request->session()->put('booking_details', $booking_details);

        return view('booking.payment', [
            'total'=>$request->total
        ]);

    }

    public function stripe_request(Request $request)
    {
        $booking_details = session()->get('booking_details');

        $class = Classes::where('id', $booking_details['class_id'])->first();
        $date = date::where('id', $booking_details['date_id'])->first();

        // if($this->check_if_full($booking_details['date']) == true){
        //     return redirect('/basket')->with('status', 'Unfortunately this date is no longer available for $booking_details['party'] people');
        // }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $booking_details['total'] * 100,
                "currency" => "gbp",
                "source" => $request->stripeToken,
                "description" => "Booking from crowcottage.co.uk",
        ]);

        $this->store_booking_details($booking_details);
        $this->update_date_spaces($date, $booking_details['party']);
        // $this->customer_reciept($class, $date, $booking_details);
        // $this->admin_reciept($class, $date, $booking_details);
           
        return view('booking.success', [
            'date'=>$date,
            'class'=>$class,
            'booking_details'=>$booking_details
        ]);
    }

    public function check_if_full($date)
    {

    }

    public function update_date_spaces($date, $party)
    {
        $date->spaces = $date->spaces - $party;
        $date->save();

        return;
    }

    public function store_booking_details($booking_details)
    {
        $booking = new Booking;
        $booking->name = $booking_details['name'];
        $booking->email = $booking_details['email'];
        $booking->phone = $booking_details['phone'];
        $booking->spaces = $booking_details['party'];
        $booking->class_id = $booking_details['class_id'];
        $booking->date_id = $booking_details['date_id'];
        $booking->save();

        return;
    }

    public function customer_reciept($class, $date, $booking_details)
    {

    }

    public function admin_reciept($class, $date, $booking_details)
    {

    }
}
