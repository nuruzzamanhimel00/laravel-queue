<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendOTPMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()

    {
        // dd($this->data);
        $subject = "SEND OTP";
        return $this->view('email.otp-mail')

        ->from('himel@app.com')
        ->subject($subject);

        // return $this->subject('Admin mail send')
        //             ->view('email.admin-mail', [
        //                 'data' => $this->data
        //             ]);

    }
}
