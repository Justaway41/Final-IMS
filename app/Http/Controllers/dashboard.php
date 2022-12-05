<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Models\Work_log;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index()
    {
        $departments = Department::get();
        $interns = User::whereRelation('role', 'title', 'Intern')->get();
        $worklogs = Auth::user()->MonthlyWorklogs;
        $leaves = Auth::user()->MonthlyLeaves;

        if (Auth::user()->role->title != "Intern") {
            return view('admin.dashboard', ["totalinterns" => sizeof($interns)]);
        }
        return view('dashboard', ['worklogs' => $worklogs, 'leaves' => $leaves]);
    }
}
