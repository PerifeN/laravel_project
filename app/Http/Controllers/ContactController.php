<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'messageContent' => $validated['message'],
        ];

        // Sending email using Laravel's basic mail functionality
        Mail::raw("Name: {$data['name']}\nEmail: {$data['email']}\nMessage: {$data['messageContent']}", function ($message) use ($data) {
            $message->to('szerszerowski@gmail.com')
                    ->subject('New Contact Form Submission');
        });

        return back()->with('success', 'Message sent successfully!');

    }
}
