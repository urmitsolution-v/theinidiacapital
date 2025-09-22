<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactdata()
    {
        // $contact = Contact::get();
        $contact = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contact.index', compact('contact'));
    }
    public function delete(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect()->route('contact-list')->with('success', 'Delete Successfully');
    }
}
