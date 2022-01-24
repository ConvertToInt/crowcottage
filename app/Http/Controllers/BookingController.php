<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Date;

class BookingController extends Controller
{

    public function check_availability(Request $request)
    {
        // return the record

        // if not
    }

    public function store(Request $request)
    {
        // take payment

        // add name, phone, email, class_id, date_id to 'booking' table

        // -* from 'spaces'

        // send confirmation email

        // return to classes with success
    }
}
