<?php

namespace App\Mail;

use App\Models\Work_log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
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
        return $this->markdown('email.worklogMail');
    }
}
