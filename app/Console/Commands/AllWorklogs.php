<?php

namespace App\Console\Commands;

use App\Mail\worklogMail;
use App\Models\Work_log;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AllWorklogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todayWorklog';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To email todays worklog to everyone.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $work_logs = Work_log::whereDate('created_at', Carbon::today())->get();
        Mail::to("kritarthasapkota999@gmail.com")->send(new worklogMail($work_logs));
        // $work_logs = Work_log;
        return 0;
    }
}
