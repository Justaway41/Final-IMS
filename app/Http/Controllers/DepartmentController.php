<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'department_name' => 'required',
        ]);

        Department::create([
            'department_name' => $request->get('department_name'),
        ]);

        return redirect()->route('departments.index')
            ->with('success', 'Department added successfully.');
    }

    public function show($id)
    {
        $department = Department::findorFail($id);

        $users = $department->users->where('role_id', '1');

        return view('departments.single-department', ['users' => $users]);
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'department_name' => 'required',
        ]);

        $department = Department::find($id);

        $department->department_name = $request->get('department_name');

        $department->save();

        return redirect()->route('departments.index')
            ->with('success', 'Department updated successfully.');
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();

        return redirect()->route('departments.index')
            ->with('success', 'Department deleted successfully.');
    }

    public function view(Department $department)
    {
        $departments = Department::all();
        return view('departments.view', compact('departments'));
    }
}
