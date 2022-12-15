@extends('layouts.adminlayout')

@section('content')
    <div class="main">

        <div class="head-over-display">
            Worklogs
        </div>

        <div class="tableBG" style="max-width:80vw">
            <form class="d-flex align-items-center justify-content-end gap-3" method="GET"
                action="{{ route('Work_log.index') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <select class="form-select" aria-label="Default select example" name="fullname">
                        <option selected>Open this select menu</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->full_name }}">{{ $user->full_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">From</label>
                    <input type="text" id="nepali-datepicker" placeholder="Select Nepali Date"/>
                </div>
                <input type="hidden" id="eng_date" name="start_date"/>

                <div class="form-group">
                    <label for="exampleInputEmail1">To</label>
                    <input type="text" id="nepali-datepicker2" placeholder="Select Nepali Date"/>
                </div>
                <input type="hidden" id="eng_date2" name="end_date"/>

                <div class="form-group align-self-end">

                    <button type="submit" class=" btn btn-primary">Submit</button>
                </div>
            </form>
            @if (gettype($work_logs) != "array")
            <p>Total Hours: {{ $work_logs->sum('hours_worked') }}</p>
            @endif
            <table class="table mt-3">
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
    </div>
@endsection
