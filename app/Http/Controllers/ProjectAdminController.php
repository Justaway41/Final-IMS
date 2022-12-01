<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProjectAdminController extends Controller
{
    // show entire project list
    public function index(){
        return view('todo.project.index', ['projects' => Project::all()]);
    }

    // show individual project
    public function show(Request $req, $id){
        $id = Crypt::decrypt($id);
        $project = Project::find($id);
        $task = Task::where('project_id', $id)->get();
        return view('todo.project.show', ['project' => $project, 'tasks' => $task]);
    }

    public function create(){
        return view('todo.project.create');
        // where('todoname" '==' "")
    }
    public function store(Request $req){
        $formFeilds = $req->validate([
            'name' => 'required',
            'start_date' => 'required | date_format:m/d/Y',
            'deadline' => 'required | date_format:m/d/Y'
        ]);
        Project::create($formFeilds);
        return redirect('/admin/projects/');
    }
    public function edit(){

    }
    public function update(){

    }
    public function destroy(){

    }
}
