@extends('layouts.layout')

@section('content')
    <div class="worklog_over">
        Worklog
    </div>

    <div class="worklog_lower">
        <form action="{{ route('Work_log.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlTextarea1">Work</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="work" value="{{ old('work') }}"></textarea>
            </div>
            <div class="mb-3">
                <div class="time">
                    <label for="exampleInputEmail1">Start Time</label>
                    <input type="time" class="form-control" id="startTime" aria-describedby="emailHelp"
                        value="{{ old('start_time') }}" name="start_time">

                    <label for="exampleInputEmail1">End Time</label>
                    <input type="time" class="form-control" id="endTime" aria-describedby="emailHelp"
                        value="{{ old('end_time') }}" name="end_time">
                </div>
            </div>
            <button onclick="timeCalculator()">Calculate Hours</button>
            <div class="mb-3">
                <label for="exampleInputEmail1">Total Hours</label>
                <input type="number" class="form-control" id="totalTime" aria-describedby="emailHelp"
                    value="{{ old('total_time') }}" name="hours_worked" readonly>
            </div>
            <div class="form-check">
                <p>

                    Note: Total Hours cannot exceed 8 hours
                </p>
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">I understand that work once submitted cannot be
                    edited</label>
            </div>


            <div>

                <button type="submit" class=" m-2 btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
@endsection
