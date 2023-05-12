<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use MilanTarami\NepaliCalendar\Facades\NepaliCalendar;

class worklogMail extends Mailable
{
    use Queueable, SerializesModels;

    public $work_logs, $department;

    public function __construct($work_logs, $department)
    {
        $this->work_logs = $work_logs;
        $this->department = $department;
    }

    public function build()
    {
        $this->subject = "Intern's Daily Worklog | ";
        $this->subject .= (string) NepaliCalendar::AD2BS(Carbon::today()->format('Y-m-d'))['BS_DATE'];
        return $this
            ->subject($this->subject)
            ->markdown('email.worklogMail');
    }
}
