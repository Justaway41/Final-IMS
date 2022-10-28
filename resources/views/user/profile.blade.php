@extends('layouts.layout')

@section('content')
    <div class="profile_container">
        <img class="profile_pic" src="{{ asset('storage/' . auth()->user()->photo) }}" alt="profilepicture">
        <h1 class="title1">{{ auth()->user()->full_name }}</h1>
        <h2 class="title2">{{ auth()->user()->role->title }}</h2>
        <div class="subdiv">
            <ul class="leftDiv">
                <li>Department</li>
                <li>Intern ID</li>
                <li>Email</li>
                <li>Mobile</li>
                <li>Address</li>
                <li>Contract Start Date</li>
                <li>Contract End Date</li>
            </ul>
            <ul class="rightDiv">
                <li>{{ auth()->user()->department->department_name }}</li>
                <li>{{ auth()->user()->id }}</li>
                <li>{{ auth()->user()->email }}</li>
                <li>{{ auth()->user()->contact }}</li>
                <li>{{ auth()->user()->address }}</li>
                <li>{{ auth()->user()->contract_start_date }}</li>
                <li>{{ auth()->user()->contract_end_date }}</li>
            </ul>
        </div>

        <div>
            <a href="#">
                <button class="contractHistory">Contract History</button>
            </a>
        </div>
    </div>
@endsection
