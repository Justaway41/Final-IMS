<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeavesFormRequest;
use App\Mail\leaveMail;
use App\Mail\mailStatus;
use App\Models\Leaves;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.leaves');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $users)
    {
        $users = User::has('leaves')->get();
        return view('admin.leaves', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        Mail::to('kritartha.sapkota@deerwalk.edu.np')->send(new leaveMail($mailData));
        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function show(Leaves $leaves)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
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
        Mail::to('kritartha.sapkota@deerwalk.edu.np')->send(new mailStatus($mailStatus));
        return redirect()->route('leaves.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function update(LeavesFormRequest $request, $id)
    {
        //   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leaves $leaves)
    {
        //
    }
}
