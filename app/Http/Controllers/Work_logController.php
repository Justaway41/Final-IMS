<?php

namespace App\Http\Controllers;

use App\Http\Requests\worklogFormRequest;
use App\Models\Work_log;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Work_logController extends Controller
{
    public function index()
    {
        if (Auth::user()->role->title === 'Admin' || 'Manager') {

            $work_log = Work_log::latest()->get();
            return view('worklog.allWorklog', ['work_logs' => $work_log]);
        }
        abort(404);
    }

    public function create()
    {
        return view('worklog.index');
    }

    public function store(worklogFormRequest $request)
    {
        $currentTime = Carbon::now()->toTimeString();
        $timeLimit = Carbon::createFromTime(20, 00, 00)->toTimeString();
        if ($currentTime < $timeLimit) {

            $request->validated();

            Work_log::create([
                'user_id' => auth()->user()->id,
                'work' => $request->work,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'hours_worked' => $request->hours_worked
            ]);
            return redirect(route('dashboard'));
        }


        return redirect()->route('Work_log.create')->with('message', 'Submit time exceeded. Please contact your manager.');
    }

    public function show(Work_log $work_log)
    {
        //
    }

    public function edit(Work_log $work_log)
    {
        //
    }

    public function update(Request $request, Work_log $work_log)
    {
        //
    }

    public function destroy(Work_log $work_log)
    {
        //
    }
}
