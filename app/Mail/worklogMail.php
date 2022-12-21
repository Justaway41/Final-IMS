<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class worklogMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $work_logs, $department;



    public function __construct($work_logs, $department)
    {
        $this->work_logs = $work_logs;
        $this->department = $department;
    }

    /**
     * Build the message.
     *
     * @return $this
     */



    public function build()
    {
        return $this->markdown('email.worklogMail')
            ->subject("Intern's Daily Worklog");
    }
}
