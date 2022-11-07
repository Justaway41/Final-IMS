@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Settings
    </div>
    <div class="adminDash">
        <a class="a1" href="{{ route('missedWorklog') }}">Missed Worklog</a>
        <a class="a2" href="{{ route('users.index') }}">Interns</a> 
        <a class="a3" href="{{ route('totalhours') }}">Total Hours</a>
        {{-- <a class="a4" href="#">Leaves</a>
        <a class="a5" href="#">Projects</a>
        <a class="a6" href="#">Settings</a>  --}}
    </div>
@endsection
