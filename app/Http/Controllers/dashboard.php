<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Work_log;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index()
    {
        $departments = Department::get();
        $interns = User::whereRelation('role', 'title', 'Intern')->get();
        $worklogs = Auth::user()->MonthlyWorklogs;
        $leaves = Auth::user()->MonthlyLeaves;
        $projects = Project::all();
        if (Auth::user()->role->title != "Intern") {
            return view('admin.dashboard', ["totalinterns" => sizeof($interns), 'projects' => $projects, 'projectCount' => ProjectAdminController::getProjectCount()]);
        }
        return view('dashboard', ['worklogs' => $worklogs, 'leaves' => $leaves]);
    }
}
