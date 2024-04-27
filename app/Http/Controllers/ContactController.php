<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactUs;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //
    public function show() {
        return view('contact');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|min:5|max:20',
            'lastName' => 'required|string|min:5|max:20',
            'email' => 'required|email',
            'subject' => 'required|string|min:5|max:20',
            'message' => 'required|string|min:5|max:200'
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0,'errors' => $validator->errors()->toArray()]);
        }else {
            $values = [
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ];
           $flag =  Contact::create($values);
           if($flag) {
            // Mail::to('sayedtaqi313ahmadi@gmail.com')->send(new ContactUs($flag));
            return response()->json(['status' => 1,'success'=>'the message have been sent']);
           }else {
            return response()->json(['status' => 2,'error'=>'the message have been sent']);
           }
        }

 
   
          
    }
}
