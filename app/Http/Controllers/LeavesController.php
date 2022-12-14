<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeavesFormRequest;
use App\Mail\leaveMail;
use App\Mail\mailStatus;
use App\Models\Leaves;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LeavesController extends Controller
{
    public function index()
    {
        return view('user.leaves');
    }

    public function create(User $users)
    {
        if (Auth::user()->role->title != 'Manager') {
            $users = User::has('leaves')->get();
        } else {
            $users = User::whereRelation('department', 'department_name', Auth::user()->department->department_name)->has('leaves')->get();
        }
        return view('admin.leaves', ['users' => $users]);
    }

    public function store(LeavesFormRequest $request)
    {
        $request->validated();
        Leaves::create([
            'reason' => $request->reason,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_days' => $request->total_days,
            'status' => 'pending',
            'user_id' => $request->user_id,
        ]);

        $mailData = [
            'reason' => $request->reason,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_days' => $request->total_days,
            'name' => $request->user()->full_name,
        ];

        if (Auth::user()->department->department_name == 'DDL') {
            Mail::to('aahishma.khanal@sifal.deerwalk.edu.np')->send(new leaveMail($mailData));
        } elseif (Auth::user()->department->department_name == 'Library') {
            Mail::to('chetana.ghimire@sifal.deerwalk.edu.np')->send(new leaveMail($mailData));
        } elseif (Auth::user()->department->department_name == 'Biology') {
            Mail::to('suresh.chandyo@sifal.deerwalk.edu.np')->send(new leaveMail($mailData));
        } elseif (Auth::user()->department->department_name == 'IT') {
            Mail::to('kushal.maharjan@sifal.deerwalk.edu.np')->send(new leaveMail($mailData));
        }
        return redirect('dashboard');
    }

    public function edit(Request $request, $id)
    {
        $model = Leaves::findorFail($id);
        $model->status = $request->status;
        $model->update(['status', $request->status]);

        $mailStatus = [
            'name' => $model->user->full_name,
            'email' => $model->user->email,
            'total_days' => $model->total_days,
            'status' => $request->status,
        ];
        Mail::to($mailStatus['email'])->send(new mailStatus($mailStatus));
        return redirect()->route('leaves.create');
    }
}
