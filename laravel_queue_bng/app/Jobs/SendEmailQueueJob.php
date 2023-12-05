<?php

namespace App\Jobs;

use App\Mail\SendAdminMail;
use App\Mail\UserMailSend;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailQueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $latest_users;
    protected $user;
    protected $data;
    public function __construct($latest_users, $user, $data)
    {
        $this->data = $data;
        $this->latest_users = $latest_users;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        \Mail::to('your_receiver_email@gmail.com')->send(new SendAdminMail($this->latest_users));
        \Mail::to($this->data['email'])->send(new UserMailSend($this->user));
    }
}
