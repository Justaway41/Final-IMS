<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Work_log;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index()
    {
        $departments = Department::get();

        $worklogs = Auth::user()->MonthlyWorklogs;
        $leaves = Auth::user()->MonthlyLeaves;
        // $worklogs = Work_log::whereDate('created_at', '>=', "2022-10-18", )->whereDate('created_at','<=',"2022-11-16")->get();

        // dd($worklogs);
        if (Auth::user()->role->title != "Intern") {
            return view('admin.dashboard', ['departments' => $departments]);
        }
        return view('dashboard', ['worklogs' => $worklogs, 'leaves' => $leaves]);
    }
}
