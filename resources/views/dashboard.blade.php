@extends('layouts.layout')

@section('content')
<div class="head-over-display">
    Dashboard
</div>

<div class="dashboard">

    <div class="leftView">
        <canvas id="myChart"></canvas><br>

        {{-- apply leaves --}}
        <div id="myleaves">
            <div class="leaves">
                <a class="apply_leaves" href="{{ route('leaves.index') }}">Apply for Leave</a>
            </div>

            <p class="leave_records">Past Leave Records:</p>
            <section class="leaves_scroll">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Reason</th>
                            <th scope="col">From date</th>
                            <th scope="col">To date</th>
                            <th scope="col">Days</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    @foreach ($leaves as $leave)
                    <tbody>
                        <tr class="hover">
                            <td style="width:15px">{{ $leave->reason }}</td>
                            <td>{{ $leave->start_date }}</td>
                            <td>{{ $leave->end_date }}</td>
                            <td>{{ $leave->total_days }}</td>
                            <td>
                                <p
                                    class="leave_status {{ $leave->status == 'approved' ? 'green' : ($leave->status == 'rejected' ? 'red' : 'yellow') }}">
                                    {{ ucfirst($leave->status) }}</p>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </section>
        </div>
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

<script>
    let app = {{ Js::from($worklogs) }};
        let xValues = ['Today', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'];
        let yValues = [];

        for (let i = 0; i < 7; i++) {
            // console.log(app.length)
             app[i] === undefined ?  yValues[i] = 0 :  yValues[i] = app[i].hours_worked;


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