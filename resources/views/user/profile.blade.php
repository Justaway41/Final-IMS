@extends('layouts.layout')

@section('content')

<div class="profileContainer">
    <div class="profilePic">
        <img src="{{asset('storage/'. auth()->user()->photo) }}" alt="profilepicture">
    </div>
    <div class="title">
        <h1>{{ auth()->user()->full_name }}</h1>
        <h2>{{ auth()->user()->role->title }}</h2>
    </div>
    <div class="subdiv">
        <ul class="rightDiv">
            <li>Department</li>
            <li>Intern ID</li>
            <li>Email</li>
            <li>Mobile</li>    
            <li>Address</li>
            <li>Contract Start Date</li>
            <li>Contract End Date</li>
        </ul>
        <ul class="leftDiv">
            <li>{{ auth()->user()->department->department_name }}</li>
            <li>{{ auth()->user()->id }}</li>
            <li>{{ auth()->user()->email }}</li>

            <li>{{ auth()->user()->contact }}</li>
            <li>{{ auth()->user()->address }}</li>
            <li>{{ auth()->user()->contract_start_date }}</li>
            <li>{{ auth()->user()->contract_end_date }}</li>

        </ul>
    </div>
    <div class="contractHistory">
        <a href="#">Contract History</a>
    </div>

</div>


@endsection