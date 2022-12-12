<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Project;
use App\Models\Task;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProjectAdminController extends Controller
{
    // show entire project list
    public function index()
    {
        return view('todo.project.index', ['projects' => Project::latest()->get()]);
    }

    // show individual project
    public function show($id)
    {
        if (Auth::user()->role->title != "Intern") {
            abort(404);
        }
        $project = Project::find($id);
        $task = Task::where('project_id', $id)->get();
        return view('todo.project.show', ['project' => $project, 'tasks' => $task]);
    }

    public function create()
    {
        $departments = Department::all();
        return view('todo.project.create', ['departments' => $departments]);
    }

    public function store(Request $req)
    {
        $formFields = $req->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        Project::create($formFields);
        return redirect('/admin/projects/');
    }
    public function edit($id)
    {
        return view('todo.project.edit', ['project' => Project::find($id)]);
    }
    public function update(Request $req, $id)
    {
        $project = Project::find($id);
        if ($project->name != $req->get('name')) {
            $project->name = $req->get('name');
            $project->save();
            return redirect(route('admin.projects.index'));
        } else if ($project->start_date != $req->get('start_date')) {
            $project->start_date = $req->get('start_date');
            $project->save();
            return redirect(route('admin.projects.index'));
        } else if ($project->deadline != $req->get('deadline')) {
            $project->deadline = $req->get('deadline');
            $project->save();
            return redirect(route('admin.projects.index'));
        }


        $formFields = $req->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $project->update($formFields);
        return redirect(route('admin.projects.index'));
    }
    public function destroy($id)
    {
        $project = Project::find($id);
        $task = Task::where('project_id', $id);
        $task->delete();
        $project->destroy($id);

        return back();
    }

    public static function getProjectCount()
    {
        $project = Project::all();
        $projectCount = $project->count();
        if ($projectCount > 0) return $projectCount;
        return 0;
    }
}
