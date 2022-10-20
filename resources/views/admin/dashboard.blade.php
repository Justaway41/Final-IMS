@extends('layouts.layout')

@section('content')
<div class="container bg-white">
    <livewire:box-container />

   
   <h1>Admin Dashboards</h1>


   <a href="{{ route('departments.index') }}">Departments</a>
    <a href="#">Leaves</a>
    <a href="{{ route('users.index') }}">Interns</a>
    <a href="#">Settings</a>
</div>
@endsection

