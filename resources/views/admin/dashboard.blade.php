@extends('layouts.layout')

@section('content')
    <ul>
        <li><a href="/view">Departments</a></li>
        <li><a href="#">Leaves</a></li>
        <li><a href="{{ route('users.index') }}">Interns</a></li>
        <li><a href="#">Settings</a></li>
    </ul>
@endsection
