<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Contact Form Submission')
                    ->from('no-reply@example.com', 'Contact Form')
                    ->view('emails.contactMail') // Ensure this path exists
                    ->with('data', [
                        'name' => 'Test Name',
                        'email' => 'test@example.com',
                        'message' => 'This is a test message.',
                    ]);
    }
}

