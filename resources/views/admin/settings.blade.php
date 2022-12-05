@extends('layouts.adminlayout')

@section('content')
   
    <div class="adminDash">
        <a class="a6" href="{{ route('missedWorklog') }}">Missed Worklog</a>
        <a class="a5" href="{{ route('totalhours') }}">Total Hours</a>
        <a class="a4" href="{{ route('departments.index') }}">New Department</a>
        <a class="a3" href="{{ route('roles.index') }}">New Role</a>
        <a class="a1" href="{{ route('leaves.create') }}">Verify Leaves</a>
        <a class="a2" href="#">Add Project</a>
    </div>
@endsection
