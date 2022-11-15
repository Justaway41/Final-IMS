@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Dashboard
    </div>

    <div class="dashboard">
        <div class="leftView">
            <canvas id="myChart"></canvas><br>
            <div class="apply-leaves" style="height: 50px; width:100px">
                <a href="{{ route('leaves.index') }}">Apply Leaves</a>
            </div>
            <section class="dashboard_scroll">
                @foreach ($leaves as $leave)
                <div class="singleWorklog">
                    <p class="work" id="underline">{{ $leave->start_date }}</p>
                    <p class="work" id="underline">{{ $leave->end_date }}</p>
                    <p class="work">{{ $leave->reason }}</p>
                    <p class="work  {{ $leave->status == 'approved' ? 'green' : ($leave->status == 'disapproved'? 'red' : 'yellow') }}   ">{{ ucfirst($leave->status) }}</p>
                    <p class="work" id="right">{{ $leave->total_days }}</p>
                </div>
                @endforeach
            </section>
        </div>
        
        <div class="work_view">
            <h2>Total Hours: {{ $worklogs->sum('hours_worked') || 0 }}</h2>
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

    <script>
        let app = {{ Js::from($worklogs) }};
        let xValues = ['Day 7', 'Day 6', 'Day 5', 'Day 4', 'Day 3', 'Day 2', 'Day 1'];
        let yValues = [];

        for (let i = 0; i < 7; i++) {
            yValues[i] = app[i].hours_worked;


        }
        let barColors = "#172b4d";

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            max: 8
                        }
                    }]
                },
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Your Working Hours:"
                }
            }
        });
    </script>
@endsection
