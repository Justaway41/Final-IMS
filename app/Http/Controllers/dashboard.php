<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Work_log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index(Request $request)
    {
        $worklogs = Auth::user()->MonthlyWorklogs;
        $leaves = Auth::user()->MonthlyLeaves;
        $projects = Project::all();

        if (Auth::user()->role->title == "Admin") {
            $interns = User::whereRelation('role', 'title', 'Intern')->get();
            return view('admin.dashboard', ["totalinterns" => sizeof($interns), 'projects' => $projects, 'projectCount' => ProjectAdminController::getProjectCount()]);
        } elseif (Auth::user()->role->title == "Manager") {
            $interns = User::whereRelation('role', 'title', 'Intern')->whereRelation('department', 'department_name', Auth::user()->department->department_name)->get();
            return view('manager.dashboard', ["totalinterns" => sizeof($interns), 'projects' => $projects, 'projectCount' => ProjectAdminController::getProjectCount()]);
        } elseif (Auth::user()->contract_status === "inactive") {
            abort(403, "Your account is inactive");
        } else {
            if ($request->start_date == null && $request->end_date == null) {
                return view('dashboard', ['worklogs' => $worklogs, 'leaves' => $leaves]);
            } elseif ($request->start_date != null && $request->end_date != null) {
                $worklogs = Work_log::where('user_id', Auth::id())
                    ->when($request->start_date != null && $request->end_date != null, function ($q) use ($request) {
                        $q->whereDate('created_at', '>=', $request->start_date)
                            ->whereDate('created_at', '<=', $request->end_date);
                    })
                    ->get();

            }
            return view('dashboard', ['worklogs' => $worklogs, 'leaves' => $leaves]);
        }
    }

}
