<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactUs;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function show() {
        return view('contact');
    }

    public function store(ContactRequest $request) {
       $data =  $contact = Contact::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        if(!$contact) {
            return back()->with('eorror','there is a problem please try again');
        }
            Mail::to('sayedtaqi313ahmadi@gmail.com')->send(new ContactUs($data));
            return back()->with('success','you message have been sent successfully');
    }
}
