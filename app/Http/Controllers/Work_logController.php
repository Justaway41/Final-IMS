<?php

namespace App\Http\Controllers;

use App\Http\Requests\worklogFormRequest;
use App\Models\User;
use App\Models\Work_log;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MilanTarami\NepaliCalendar\Facades\NepaliCalendar;

class Work_logController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role->title === 'Manager') {

            $users = User::whereRelation('role', 'title', 'Intern')->whereRelation('department', 'department_name', Auth::user()->department->department_name)->get();
            $work_log = [];
            if ($request->start_date != null && $request->end_date != null && $request->fullname != "Select Intern Name") {
                $work_log = Work_log::when($request->start_date != null && $request->end_date != null, function ($q) use ($request) {
                    $q->whereRelation('user', 'full_name', $request->fullname)
                        ->whereDate('created_at', '>=', $request->start_date)
                        ->whereDate('created_at', '<=', $request->end_date);
                })->get();
            } elseif ($request->start_date != null && $request->end_date != null && $request->fullname == "Select Intern Name") {
                $work_log = Work_log::when($request->start_date != null && $request->end_date != null, function ($q) use ($request) {
                    $q->whereDate('created_at', '>=', $request->start_date)
                        ->whereDate('created_at', '<=', $request->end_date);
                })->get();
            }
            return view('worklog.allWorklog', ['users' => $users, 'work_logs' => $work_log]);
        } elseif (Auth::user()->role->title === 'Admin') {
            $users = User::whereRelation('role', 'title', 'Intern')->get();
            $work_log = [];
            if ($request->start_date != null && $request->end_date != null && $request->fullname != "Select Intern Name") {
                $work_log = Work_log::when($request->start_date != null && $request->end_date != null, function ($q) use ($request) {
                    $q->whereRelation('user', 'full_name', $request->fullname)
                        ->whereDate('created_at', '>=', $request->start_date)
                        ->whereDate('created_at', '<=', $request->end_date)
                        ->orderBy('created_at','desc');
                })->get();
            } elseif ($request->start_date != null && $request->end_date != null && $request->fullname == "Select Intern Name") {
                $work_log = Work_log::when($request->start_date != null && $request->end_date != null, function ($q) use ($request) {
                    $q->whereDate('created_at', '>=', $request->start_date)
                        ->whereDate('created_at', '<=', $request->end_date)
                        ->orderBy('created_at','desc');
                })->get();
            }
            return view('worklog.allWorklog', ['users' => $users, 'work_logs' => $work_log]);
        }

        abort(404);
    }

    public function create(Request $request)
    {
        if ($request->user()->cannot('create', "App\Models\Work_log")) {
            abort(403, "Only one worklog per day");
        } else if (Auth::user()->contract_status === "inactive") {
            abort(403, "Your account is inactive");
        } else {

            return view('worklog.index');
        }
    }

    public function store(worklogFormRequest $request)
    {
        try{
 $currentTime = Carbon::now()->toTimeString();
        $timeLimit = Carbon::createFromTime(20, 30, 00)->toTimeString();

        if ($currentTime < $timeLimit || Auth::user()->role->title !== 'Intern') {

            $request->validated();
            if(Auth::user()->role->title == 'Intern'){
                Work_log::create([
                    'user_id' => $request->user_id,
                    'work' => $request->work,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'hours_worked' => $request->hours_worked,
                ]);
            }
            else{
                
                    $created_at = NepaliCalendar::BS2AD($request->created_at)['AD_DATE'];
                
                Work_log::create([
                    'user_id' => $request->user_id,
                    'work' => $request->work,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'hours_worked' => $request->hours_worked,
                    'created_at'=>$created_at
                ]);
            }
            return redirect()->route('dashboard')->with('message', 'Submitted Sucessfully.');
        }
        return redirect()->route('Work_log.create')->with('message', 'Submit time exceeded. Please contact your manager.');
    }
    catch(Exception $e){
        dd($e);
    }

    }

    public function show($id)
    {
        if (Auth::user()->role == 'Admin' || 'Manager') {
            return view('worklog.missedWorklog', ['users' => User::findOrFail($id)]);
        }
        abort(404);
    }

    public function users()
    {
        if (Auth::user()->role->title == "Manager") {
            //to view interns to add worklog after 8
            $interns = User::whereRelation('role', 'title', 'Intern')->whereRelation('department', 'department_name', Auth::user()->department->department_name)->paginate(7);
        } else {
            $interns = User::whereRelation('role', 'title', 'Intern')->paginate(7);
        }
        return view('admin.interns', ['interns' => $interns]);
        }
    
    

    public function total(Request $request)
    {
        $startDate = 0;
        $endDate = 0;
        if (Auth::user()->role->title == 'Admin') {
            $users = User::whereRelation('role', 'title', 'Intern')->get();
        } else {
            $users = User::whereRelation('role', 'title', 'Intern')->whereRelation('department', 'department_name', Auth::user()->department->department_name)->get();
        }
        if ($request->start_date != null && $request->end_date != null) {
            $startDate = $request->start_date;
            $endDate = $request->end_date;
        }

        return view('admin.totalHours', ['users' => $users, 'startDate' => $startDate, 'endDate' => $endDate]);
    }
}
