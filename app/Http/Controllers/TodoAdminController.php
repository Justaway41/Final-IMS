<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TodoAdminController extends Controller
{
    public function index(){
        return view('todo.admin.index');
    }
    public function create($id){
        $users = User::all();
        return view('todo.admin.create', ['users' => $users, 'project' => Project::find($id)]);
    }

    public function store(Request $req, $id){
        $formFields = $req->validate([
            'todo' => 'required',
            'assign_to' => 'required',
            'deadline' => 'required | date_format:m/d/Y',
        ]);
        $formFields['project_id'] = $id;

        Task::create($formFields);
        return redirect(route('admin.projects.show', Project::find($id)));
        
    }

    public function show(){
        return view('todo.admin.show', ['tasks' => Task::all(), 'tasks_completed' => ['red', 'yellow', 'green']]);
    }


    public function edit(Request $req, $id){
        $task = Task::find($id);
        return view('todo.admin.edit', ['task' => $task]);
    }

    public function update(Request $req){
        dd($req);
    }

    // update the task progress based on button click
    public function updateProgress(Request $req, $id){
        $id = Crypt::decrypt($id);
        $task = Task::find($id);
        if($task->completed){
            $task->completed = 0;
            $task->save();
        } else{
            $task->completed = 1;
            $task->save();
        }
        return back();
    }
}
