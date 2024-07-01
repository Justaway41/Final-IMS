<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Work_log;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MilanTarami\NepaliCalendar\Facades\NepaliCalendar;

class dashboard extends Controller
{
    public function index(Request $request)
    {
        try{
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
                    $worklogs = Work_log::where('user_id', Auth::id())->get();
                    $leaves = []; // Fetch or define your leaves data
                    return view('dashboard', ['worklogs' => $worklogs, 'leaves' => $leaves]);
                }
                // If both dates are provided
                if ($request->start_date != null && $request->end_date != null) {
                    // Convert Nepali dates to Gregorian dates
                    $start_date = NepaliCalendar::BS2AD($request->start_date)['AD_DATE'];
                    $end_date = NepaliCalendar::BS2AD($request->end_date)['AD_DATE'];
                    // Fetch work logs based on the converted dates
                    $worklogs = Work_log::where('user_id', Auth::id())
                        ->when($start_date != null && $end_date != null, function ($q) use ($start_date, $end_date) {
                            $q->whereDate('created_at', '>=', $start_date)
                              ->whereDate('created_at', '<=', $end_date);
                        })
                        ->get();
                    $leaves = []; // Fetch or define your leaves data
                    return view('dashboard', ['worklogs' => $worklogs, 'leaves' => $leaves]);
                }
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error','Something went wrong.');
        }
        }
        

}
