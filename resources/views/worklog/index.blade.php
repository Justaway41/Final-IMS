@extends('layouts.layout')

@section('content')
<<<<<<< HEAD
@if($message = Session::get('message'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
=======
>>>>>>> ad69543e7423ce23dd391214609c0f97336c1496
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


                <div class="timelog" id="time-row">

                    <div class="mb-3 time">
                        <label for="exampleInputEmail1">Start Time</label>
                        <input type="time" class="form-control startTime"  aria-describedby="emailHelp"
                             name="start_time[]">
                        @error('start_time')
                            <p class="text-danger small"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3 time">
                        <label for="exampleInputEmail1">End Time</label>
                        <input type="time" class="form-control endTime"  aria-describedby="emailHelp"
                             name="end_time[]">
                        @error('end_time')
                            <p class="text-danger small"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <a href="#" class="btn btn-primary p-2 d-block w-75" onclick="addTiming();">Add
                        Timing</a>
                </div>

                <button class="time_calculate" onclick="timeCalculator()">Calculate Hours</button>

                <div class="mb-3">
                    <label for="exampleInputEmail1">Total Hours</label>
                    <input type="text" class="form-control" id="totalTime" aria-describedby="emailHelp"
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
                    @if ($message = Session::get('message'))
                        <p class="text-danger small"> <strong>{{ $message }}</strong></p>
                    @endif
                    <button type="submit" class="submit_work">Submit</button>
                </div>
            </section>
        </form>
    </div>
@endsection
