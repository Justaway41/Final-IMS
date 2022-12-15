<?php

namespace App\Http\Controllers;

use App\Http\Requests\worklogFormRequest;
use App\Models\User;
use App\Models\Work_log;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Work_logController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role->title === 'Manager') {
            $users = User::whereRelation('role', 'title', 'Intern')->whereRelation('department', 'department_name', Auth::user()->department->department_name)->get();
            if ($request->start_date != null && $request->end_date != null) {
                $work_log = Work_log::when($request->start_date != null && $request->end_date != null, function ($q) use ($request) {
                    $q->whereRelation('user', 'full_name', $request->fullname)
                        ->whereDate('created_at', '>=', $request->start_date)
                        ->whereDate('created_at', '<=', $request->end_date);
                })->get();
            }
            return view('worklog.allWorklog', ['users' => $users, 'work_logs' => $work_log]);
        } elseif (Auth::user()->role->title === 'Admin') {
            $users = User::whereRelation('role', 'title', 'Intern')->get();
            if ($request->start_date != null && $request->end_date != null) {
                $work_log = Work_log::when($request->start_date != null && $request->end_date != null, function ($q) use ($request) {
                    $q->whereRelation('user', 'full_name', $request->fullname)
                        ->whereDate('created_at', '>=', $request->start_date)
                        ->whereDate('created_at', '<=', $request->end_date);
                })->get();
            } else {
                $work_log = Work_log::latest()->get();
            }
            return view('worklog.allWorklog', ['users' => $users, 'work_logs' => $work_log]);
        }

        abort(404);
    }

    public function create(Request $request)
    {
        if ($request->user()->cannot('create', "App\Models\Work_log")) {
            abort(403, "Only one worklog per day");
        }
        return view('worklog.index');
    }

    public function store(worklogFormRequest $request)
    {
        $currentTime = Carbon::now()->toTimeString();
        $timeLimit = Carbon::createFromTime(20, 30, 00)->toTimeString();

        if ($currentTime < $timeLimit || Auth::user()->role->title !== 'Intern') {

            $request->validated();

            Work_log::create([
                'user_id' => $request->user_id,
                'work' => $request->work,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'hours_worked' => $request->hours_worked
            ]);
            return redirect(route('dashboard'));
        }
        return redirect()->route('Work_log.create')->with('message', 'Submit time exceeded. Please contact your manager.');
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
            $interns = User::whereRelation('role', 'title', 'Intern')->whereRelation('department', 'department_name', Auth::user()->department->department_name)->get();
        } else {
            $interns = User::whereRelation('role', 'title', 'Intern')->get();
        }
        return view('admin.interns', ['interns' => $interns]);
    }

    public function total(Request $request)
    {
        if (Auth::user()->role->title == 'Admin') {
            $users = User::whereRelation('role', 'title', 'Intern')->get();
        } else {
            $users = User::whereRelation('role', 'title', 'Intern')->whereRelation('department', 'department_name', Auth::user()->department->department_name)->get();
        }

        return view('admin.totalHours', ['users' => $users]);
    }
}
