<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index()
    {
        if (Auth::user()->role->title == "Admin") {

            $interns = User::whereRelation('role', 'title', 'Intern')->get();
        }
        $interns = User::whereRelation('role', 'title', 'Intern')->whereRelation('department', 'department_name', Auth::user()->department->department_name)->get();

        $worklogs = Auth::user()->MonthlyWorklogs;
        $leaves = Auth::user()->MonthlyLeaves;
        $projects = Project::all();
        if (Auth::user()->role->title != "Intern") {
            return view('admin.dashboard', ["totalinterns" => sizeof($interns), 'projects' => $projects, 'projectCount' => ProjectAdminController::getProjectCount()]);
        }
        return view('dashboard', ['worklogs' => $worklogs, 'leaves' => $leaves]);
    }
}
