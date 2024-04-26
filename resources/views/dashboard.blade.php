@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Dashboard
    </div>

    <div class="dashboard">

        <div class="leftView">
            <canvas id="myChart"></canvas><br>

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
            <div class="topView d-flex align-items-center justify-content-between">
                <h2>Total Hours: {{ $worklogs->sum('hours_worked') }}</h2>
            </div>
            <form class="d-flex align-items-center justify-content-end gap-3" method="GET" action="{{ route('dashboard') }}">
                @csrf
                <div class="form-group">
                    <label for="start_date">From</label>
                    <input type="date" id="start_date" name="start_date" placeholder="Select English Date" value="{{ isset($_GET['start_date']) ? $_GET['start_date'] : '' }}" />
                </div>
                <div class="form-group">
                    <label for="end_date">To</label>
                    <input type="date" id="end_date" name="end_date" placeholder="Select English Date" value="{{ isset($_GET['end_date']) ? $_GET['end_date'] : '' }}" />
                </div>
                <div class="form-group align-self-end">
                    <button type="submit" class="createUser btn btn-primary" style="background-color:#172B4D">Submit</button>
                </div>
            </form>
            
            <section class="dashboard_scroll pb-5">
                @foreach ($worklogs as $worklog)
                    <div class="singleWorklog">
                        <p class="work">{{ $worklog->created_at->format('M d') }}</p>
                        <p class="work">{{ $worklog->work }}</p>
                        <p class="work">{{ $worklog->hours_worked }} hours</p>
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
            app[i] === undefined ? yValues[i] = 0 : yValues[i] = app[i].hours_worked;


        }
        let barColors = "#172b4d";

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    fill: false,
                    borderWidth: 2,
                    pointHoverBackgroundColor: barColors,
                    borderColor: barColors,
                    pointHoverBackgroundColor: barColors,
                    pointBackgroundColor: barColors,
                    tension: 0,
                    data: yValues
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            max: 9
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
