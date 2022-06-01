<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Date;
use App\Models\Booking;
use Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminBookingReciept;
use App\Mail\CustomerBookingReciept;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $request->session()->forget('order_details');

        $class = Classes::where('id', $request->class_id)->first();

        $booking_details = [];
        $booking_details['class_id'] = $request->class_id;
        $booking_details['date_id'] = $request->date_id;
        $booking_details['participants'] = $request->participants;
        $booking_details['total'] = $request->participants * $class->price_per_block;
        $request->session()->put('booking_details', $booking_details);

        return view('booking.create', [
            'booking_details'=>$booking_details
        ]);
    }

    public function review(Request $request)
    {
        $booking_details = session()->get('booking_details');
        $booking_details['name'] = $request->name; //VALIDATE
        $booking_details['email'] = $request->email;
        $booking_details['phone'] = $request->phone;
        $request->session()->put('booking_details', $booking_details);
        
        $date = Date::where('id', $booking_details['date_id'])->first();
        $class = Classes::where('id', $booking_details['class_id'])->first();

        return view('booking.review', [
            'booking_details'=>$booking_details,
            'date'=>$date,
            'class'=>$class
        ]);
        
    }

    public function payment(Request $request)
    {  
        $booking_details = session()->get('booking_details');

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

        if($this->check_if_full($date) == true){
            return redirect('/classes')->withErrors(['msg' => 'Unfortunately this date now only has ' . $date->availability . ' spaces left.']);
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $booking_details['total'] * 100,
                "currency" => "gbp",
                "source" => $request->stripeToken,
                "description" => "Booking from crowcottage.co.uk",
        ]);

        $this->store_booking_details($booking_details);
        $this->update_date_spaces($date, $booking_details['participants']);

        $dates = [];
        $carbon_date = $date->date;
        array_push($dates, $carbon_date);

        for ($x=1;$x < $class->weeks_per_block; $x++){
            $dates[] = $carbon_date->copy()->addDays(7 * $x);
        }

        $this->customer_reciept($class, $dates, $booking_details);
        $this->admin_reciept($class, $dates, $booking_details);
           
        return view('payment_success'); //OR FAILURE
    }

    public function check_if_full($date)
    {
        if($date->availability == 0){
            return true;
        } else {
            return false;
        }

    }

    public function update_date_spaces($date, $participants)
    {
        $date->availability = $date->availability - $participants;
        $date->save();

        return;
    }

    public function store_booking_details($booking_details)
    {
        $booking = new Booking;
        $booking->name = $booking_details['name'];
        $booking->email = $booking_details['email'];
        $booking->phone = $booking_details['phone'];
        $booking->participants = $booking_details['participants'];
        $booking->class_id = $booking_details['class_id'];
        $booking->date_id = $booking_details['date_id'];
        $booking->save();

        return;
    }

    public function customer_reciept($class, $dates, $booking_details)
    {
        $mailData = array(
            'name' => $booking_details['name'],
            'email' => $booking_details['email'],
            'phone' => $booking_details['phone'],
            'participants' => $booking_details['participants'],
            'class' => $class->name,
            'dates' => $dates,
            'start_time' => Carbon::parse($class->start_time)->format('H:i'),
            'end_time' => Carbon::parse($class->end_time)->format('H:i') 
           );
        
           Mail::queue(new CustomerBookingReciept($mailData));
    }

    public function admin_reciept($class, $dates, $booking_details)
    {
        $mailData = array(
            'name' => $booking_details['name'],
            'email' => $booking_details['email'],
            'phone' => $booking_details['phone'],
            'participants' => $booking_details['participants'],
            'class' => $class->name,
            'dates' => $dates,
            'start_time' => Carbon::parse($class->start_time)->format('H:i'),
            'end_time' => Carbon::parse($class->end_time)->format('H:i')
           );
        
           Mail::queue(new AdminBookingReciept($mailData));
    }
}
