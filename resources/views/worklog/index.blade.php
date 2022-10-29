@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Worklog
    </div>

    <div class="worklog">
        <form action="{{ route('Work_log.store') }}" method="POST">
            @csrf
            <section class="worklog_scroll">

                <div class="mb-3">
                    <label for="workFill">Work</label>
                    <textarea class="form-control" id="workFill" name="work" value="{{ old('work') }}"></textarea>
                    @error('work')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="timelog">
                    <div class="mb-3" id="time">
                        <label for="exampleInputEmail1">Start Time</label>
                        <input type="time" class="form-control" id="startTime" aria-describedby="emailHelp"
                            value="{{ old('start_time') }}" name="start_time">
                        @error('start_time')
                            <p class="text-danger small"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3" id="time">
                        <label for="exampleInputEmail1">End Time</label>
                        <input type="time" class="form-control" id="endTime" aria-describedby="emailHelp"
                            value="{{ old('end_time') }}" name="end_time">
                        @error('end_time')
                            <p class="text-danger small"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>

                <button class="time_calculate" onclick="timeCalculator()">Calculate Hours</button>

                <div class="mb-3">
                    <label for="exampleInputEmail1">Total Hours</label>
                    <input type="number" class="form-control" id="totalTime" aria-describedby="emailHelp"
                        value="{{ old('total_time') }}" name="hours_worked" readonly>
                    Note: Total Hours must be between 4 to 8 hours.
                    @error('hours_worked')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox" required>
                    <label class="form-check-label" for="checkbox">I understand that work once submitted cannot be
                        edited.</label>
                </div>

                <div class="submit_button">
                    <button type="submit" class="submit_work">Submit</button>
                </div>
            </section>
        </form>
    </div>
@endsection
