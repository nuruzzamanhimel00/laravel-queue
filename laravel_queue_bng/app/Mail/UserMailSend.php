<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserMailSend extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;
    public function __construct($data)

    {
        $this->data = $data;

    }



    public function build()

    {
        // dd($this->data);
        $subject = "User Mail send";
        return $this->view('email.user-mail')
        ->with(
            ['data'=>$this->data,
            ] )
        ->from('himel@app.com')
        ->subject($subject);

        // return $this->subject('Admin mail send')
        //             ->view('email.admin-mail', [
        //                 'data' => $this->data
        //             ]);

    }
}
