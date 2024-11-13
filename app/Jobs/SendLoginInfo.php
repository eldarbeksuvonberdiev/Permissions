<?php

namespace App\Jobs;

use App\Mail\LoginInfoMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendLoginInfo implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    
    public $email;
    public $data;

    public function __construct($email,$data)
    {
        $this->email = $email;
        $this->email = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new LoginInfoMail($this->data));
    }
}
