<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $mailStatus;

    public function __construct($mailStatus)
    {
        $this->mailStatus = $mailStatus;
    }

    public function build()
    {
        return $this
            ->subject('Leave Status')
            ->view('email.leaveStatus');
    }
}
