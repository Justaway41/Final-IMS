@extends('layouts.layout')

@section('content')
    <div class="profile_container">
        <img class="profile_pic" src="{{ asset('storage/' . auth()->user()->photo) }}" alt="profilepicture">
        <h1 class="title1">{{ auth()->user()->full_name }}</h1>
        <h2 class="title2">{{ auth()->user()->role->title }}</h2>
        <div class="subdiv">
            <ul class="leftDiv">
                <li class="border-bottom">Department</li>
                <li class="border-bottom">Intern ID</li>
                <li class="border-bottom">Email</li>
                <li class="border-bottom">Mobile</li>
                <li class="border-bottom">Address</li>
                <li class="border-bottom">Contract Start Date</li>
                <li>Contract End Date</li>
            </ul>
            <ul class="rightDiv">
                <li class="border-bottom">{{ auth()->user()->department->department_name }}</li>
                <li class="border-bottom">{{ auth()->user()->id }}</li>
                <li class="border-bottom">{{ auth()->user()->email }}</li>
                <li class="border-bottom">{{ auth()->user()->contact }}</li>
                <li class="border-bottom">{{ auth()->user()->address }}</li>
                <li class="border-bottom">{{ auth()->user()->contract_start_date }}</li>
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
