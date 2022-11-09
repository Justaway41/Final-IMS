@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Settings
    </div>
    <div class="adminDash">
        <a class="a6" href="{{ route('missedWorklog') }}">Missed Worklog</a>
        <a class="a5" href="{{ route('totalhours') }}">Total Hours</a>
        <a class="a4" href="{{ route('totalhours') }}">New Department</a>
        <a class="a3" href="{{ route('totalhours') }}">New Role</a>
        <a class="a1" href="#">Verify Leaves</a>
        <a class="a2" href="#">Add Project</a>
    </div>
@endsection
