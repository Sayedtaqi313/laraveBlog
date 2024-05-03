<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index() {
        $contacts = Contact::paginate(10);
        return view('Admin.contacts.index',compact('contacts'));
    }

    public function delete(Contact $contact) {
        $contact->delete();
        return redirect()->route('admin.contacts')->with('success','the contact message deleted successfully');
    }
}
