@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Dashboard
    </div>
    <div class="adminDash">
        <a class="a1" href="/view">Departments</a>
        <a class="a2" href="{{ route('users.index') }}">Interns</a>
        <a class="a3" href="#">Worklogs</a>
        <a class="a4" href="#">Leaves</a>
        <a class="a5" href="#">Projects</a>
        <a class="a6" href="#">Settings</a>
    </div>
@endsection
