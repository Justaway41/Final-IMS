<?php

namespace App\Http\Controllers;

use App\Models\Department;

use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index()
    {
        $departments = Department::get();

        $worklogs = Auth::user()->MonthlyWorklogs;
        $leaves = Auth::user()->MonthlyLeaves;
        if (Auth::user()->role->title != "Intern") {
            return view('admin.dashboard', ['departments' => $departments]);
        }
        return view('dashboard', ['worklogs' => $worklogs, 'leaves' => $leaves]);
    }
}
