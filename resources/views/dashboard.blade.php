@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Dashboard
    </div>
    <div class="dashboard">

        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {
                'packages': ['corechart']
            });

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Date');
                data.addColumn('number', 'Hours Worked');
                data.addRows([
                    @foreach ($worklogs as $worklog)
                        ['{{ $worklog->created_at->format('M d') }}', {{ $worklog->hours_worked }}],
                    @endforeach
                ]);

                // Set chart options
                var options = {
                    'title': 'Your Working Hours:',
                    'height': 300,
                    'width': 400
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>

        <div id="chart_div">

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
