@extends('layouts.adminlayout')

@section('content')
    <div class="viewDepartments">
        <a class="dil" href="{{ route('missedWorklog') }}">Missed Worklog</a>
        <a class="dil" href="{{ route('totalhours') }}">Total Hours</a>
        @if (Auth::user()->role->title != 'Manager')
            <a class="dil" href="{{ route('departments.index') }}">New Department</a>
            <a class="dil" href="{{ route('roles.index') }}">New Role</a>
        @endif
    </div>
@endsection
