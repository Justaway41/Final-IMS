<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use GuzzleHttp\Handler\Proxy;
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
        if(auth()->user()->role_id != 2){
            abort(404);
        }
        $project = Project::find($id);
        $task = Task::where('project_id', $id)->get();
        return view('todo.project.show', ['project' => $project, 'tasks' => $task]);
    }

    public function create(){
        return view('todo.project.create');
    }
    
    public function store(Request $req){
        $formFields = $req->validate([
            'name' => 'required',
            'start_date' => 'required | date_format:m/d/Y',
            'deadline' => 'required | date_format:m/d/Y'
        ]);
        Project::create($formFields);
        return redirect('/admin/projects/');
    }
    public function edit($id){
        return view('todo.project.edit', ['project' => Project::find($id)]);
    }
    public function update(Request $req, $id){
        $project = Project::find($id);
        if($project->name != $req->get('name')){
            $project->name = $req->get('name');
            $project->save();
            return redirect(route('admin.projects.index'));
        }else if($project->start_date != $req->get('start_date')){
            $project->start_date = $req->get('start_date');
            $project->save();
            return redirect(route('admin.projects.index'));
        }else if($project->deadline != $req->get('deadline')){
            $project->deadline = $req->get('deadline');
            $project->save();
            return redirect(route('admin.projects.index'));
        }

        $formFields = $req->validate([
            'name' => 'required',
            'start_date' => 'required | date_format:m/d/Y',
            'deadline' => 'required | date_format:m/d/Y'
        ]);
        $project->update($formFields);
        return redirect(route('admin.projects.index'));
    }
    public function destroy($id){
        $project = Project::find($id);
        $task = Task::where('project_id', $id);
        $task->delete();
        $project->destroy($id);

        return back();
    }
}
