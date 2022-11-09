@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Worklogs
    </div>

    <div class="tableBG" style="min-width:40vw">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Intern Name</th>
                    <th scope="col">Work Done</th>
                    <th scope="col">Hours worked</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($work_logs as $worklog)
                    <tr class="hover">
                        <th scope="row">{{ $worklog->user->full_name }}</th>
                        <td>{{ $worklog->work }}</td>
                        <td>{{ $worklog->hours_worked }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
