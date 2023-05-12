@extends('layouts.layout')

@section('content')
<div class="head-over-display">
    Worklog
</div>

<div class="worklog">
    <form id="prevent-multiple-worklog" action="{{ route('Work_log.store') }}" method="POST">
        @csrf
        <section class="worklog_scroll">

            <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                value="{{ auth()->user()->id }}" name="user_id">

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
                    <input type="time" class="form-control startTime" aria-describedby="emailHelp" name="start_time[]">
                    @error('start_time')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="mb-3 time">
                    <label for="exampleInputEmail1">End Time</label>
                    <input type="time" class="form-control endTime" aria-describedby="emailHelp" name="end_time[]">
                    @error('end_time')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>
            </div>

            <div>
                <button class="add_timing">
                    <a href="#" class="add_timing" onclick="addTiming();">Add Timing</a>
                </button>
            </div>

            <div>
                <button class="time_calculate" onclick="timeCalculator()">Calculate Hours</button>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Total Hours</label>
                <input type="text" class="form-control" id="totalTime" aria-describedby="emailHelp"
                    value="{{ old('total_time') }}" name="hours_worked" readonly>
                Note: Total Hours must be between 1 to 8 hours.
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
                <button type="submit" id="prevent-multiple-work" class="submit_work">Submit</button>
            </div>
        </section>
    </form>
</div>
<script type="text/javascript">
    $('#prevent-multiple-worklog').submit(function(){
    $("#prevent-multiple-work", this)
      .html("Please Wait...")
      .attr('disabled', 'disabled');
    return true;
});
</script>
@endsection