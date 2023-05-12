<?php

namespace App\Mail;

use App\Models\Leaves;
use Faker\Provider\ar_EG\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Mailer\Envelope;

class leaveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    public $email;

    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    public function build()
    {
        return $this
            ->subject('Leave Application')
            ->view('email.leaveMail');
    }
}
