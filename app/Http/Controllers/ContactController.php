<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index ()
    {
        return view('backend.contact.contact', [
            'title'     => 'Contact | Dashboard',
            'contacts'  => Contact::all()
        ]);
    }

    public function store (Request $request)
    {
        $validatedData = $request->validate([
            'location'  => 'required',
            'address'   => 'required',
            'email'     => 'required|email',
            'telp'      => 'required|min:10|max:13'
        ]);

        Contact::create($validatedData);
        return redirect('/dashboard/contact')->with('success', 'New contact has been added');
    }

    public function edit (Contact $contact) 
    {
        return view('backend.contact.edit', [
            'title'     => 'Edit | Contact',
            'contact'   => $contact
        ]);
    }

    public function update (Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'location'  => 'required',
            'address'   => 'required',
            'email'     => 'required|email',
            'telp'      => 'required|min:10|max:13'
        ]);

        Contact::where('id', $contact->id)->update($validatedData);

        return redirect('/dashboard/contact')->with('update', 'Contact has been updated');
    }

    public function delete (Contact $contact)
    {
        Contact::destroy($contact->id);

        return redirect('/dashboard/contact')->with('delete', 'Contact has been deleted');
    }
}
