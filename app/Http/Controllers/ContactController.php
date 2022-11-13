<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
// use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function create(){
        return view('contact.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject'=>'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $contact = New Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = ('0' . $request->phone);
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        $mailData = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'form_message' => $request->get('message'),
        );

        Mail::queue(new ContactMail($mailData));

        return back()->with('success', 'Thanks for contacting us.');
    }
}
