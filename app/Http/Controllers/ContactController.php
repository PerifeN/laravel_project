<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class ContactController extends Controller
{
    public function showForm()
    {
        return view('contactMail');
    }


    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
    
        Mail::to('your-email@example.com')->send(new ContactMail($validated));
    
        return back()->with('success', 'Thank you for contacting us!');
    }
    
    
}
