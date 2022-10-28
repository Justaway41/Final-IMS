@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Dashboard
    </div>
    <div class="dashboard">
        <div class="graphs">
            <h1>Graphs</h1>
            <h1>Here</h1>
        </div>
        <div class="work_view">
            <h2>Total Hours: {{ $worklogs->sum('hours_worked') }}</h2>
            <section class="dashboard_scroll">
                @foreach ($worklogs as $worklog)
                    <div class="singleWorklog">
                        <p class="work" id="underline">{{ $worklog->created_at->format('M d') }}</p>
                        <p class="work">{{ $worklog->work }}</p>
                        <p class="work" id="right">{{ $worklog->hours_worked }}</p>
                    </div>
                @endforeach
            </section>
        </div>
    </div>
@endsection
