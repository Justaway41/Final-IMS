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
            <li>Intern ID</li>
            <li>Email</li>    
            <li>Address</li>
        </ul>
        <ul class="leftDiv">
            <li>{{ auth()->user()->id }}</li>
            <li>{{ auth()->user()->email }}</li>
            <li>{{ auth()->user()->address }}</li>
        </ul>
    </div>
    <div class="contractHistory">
        <a href="#">Contract History</a>
    </div>

</div>


@endsection