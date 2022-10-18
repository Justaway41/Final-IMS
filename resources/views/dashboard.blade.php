@extends('layouts.layout')

@section('content')
<div class="container bg-white">
    <livewire:box-container />

    <h1>Dashboard here</h1>
    <h1>Total Hours:{{ $worklogs->sum('hours_worked') }}</h1>
    @foreach($worklogs as $worklog)
        <div class="singleWorklog">
            <p>{{ $worklog->created_at->format('d M') }}</p>
            <p>{{ $worklog->work }}</p>
            <p>{{ $worklog->hours_worked }}</p>
        </div>
    @endforeach
</div>
@endsection

