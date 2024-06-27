<?php

namespace App\Console\Commands;

use App\Mail\worklogMail;
use App\Models\Department;
use App\Models\User;
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
        $departments = Department::get();
        foreach ($departments as $department) {
            $users = User::whereRelation('department', 'department_name', $department->department_name)->whereRelation('role', 'title', 'Intern')->get();
            $manager = User::whereRelation('department', 'department_name', $department->department_name)->whereRelation('role', 'title', 'Manager')->first();
            $noofInterns = sizeof($users);
            if ($noofInterns != 0 && $manager != null) {
                $work_logs = Work_log::whereBelongsTo($users)->whereDate('created_at', Carbon::today())->get();
                if (count($work_logs) > 0) {
                    Mail::to("bijaya.shrestha@sifal.deerwalk.edu.np")
                    ->cc(["ujjwal.poudel@sifal.deerwalk.edu.np","saurav.dhakal@deerwalk.edu.np","_ddl@sifal.deerwalk.edu.np","aakancha.thapa@deerwalk.edu.np","alisha.shakya@sifal.deerwalk.edu.np",$manager->email])
                        // ->cc([$manager->email, $department->department_email, "ujjwal.poudel@sifal.deerwalk.edu.np"])
                        ->send(new worklogMail($work_logs, $department));
                }
            }
        }
        // $work_logs = Work_log;
        return 0;
    }
}
