<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index()
    {
        $worklogs = Auth::user()->MonthlyWorklogs;
        $leaves = Auth::user()->MonthlyLeaves;
        $projects = Project::all();
        if (Auth::user()->role->title == "Admin") {

            $interns = User::whereRelation('role', 'title', 'Intern')->get();
            return view('admin.dashboard', ["totalinterns" => sizeof($interns), 'projects' => $projects, 'projectCount' => ProjectAdminController::getProjectCount()]);
        } elseif (Auth::user()->role->title == "Manager") {

            $interns = User::whereRelation('role', 'title', 'Intern')->whereRelation('department', 'department_name', Auth::user()->department->department_name)->get();
            return view('admin.dashboard', ["totalinterns" => sizeof($interns), 'projects' => $projects, 'projectCount' => ProjectAdminController::getProjectCount()]);
        } else if (Auth::user()->contract_status === "inactive") {
            abort(403, "Your account is inactive");
        } else {
            return view('dashboard', ['worklogs' => $worklogs, 'leaves' => $leaves]);
        }
    }
}
