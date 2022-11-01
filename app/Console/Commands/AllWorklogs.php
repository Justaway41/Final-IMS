<?php

namespace App\Console\Commands;

use App\Models\Work_log;
use Illuminate\Console\Command;

class AllWorklogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Email Worklog';

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


        return 0;
    }
}
