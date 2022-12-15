@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Leaves
    </div>

    <div class="worklog">
        <form action="{{ route('leaves.store') }}" method="POST">
            @csrf
            <section class="worklog_scroll">

                <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="{{ auth()->user()->id }}" name="user_id">

                <div class="mb-3">
                    <label for="leavesFill">Reason</label>
                    <textarea class="form-control" id="workFill" name="reason" value="{{ old('reason') }}"></textarea>
                    @error('reason')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="timelog" id="time-row">
                    <div class="mb-3 time">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input type="date" class="form-control start-date" aria-describedby="emailHelp"
                            name="start_date">
                        @error('start_date')
                            <p class="text-danger small"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    <div class="mb-3 time">
                        <label for="exampleInputEmail1">End Date</label>
                        <input type="date" class="form-control end-date" aria-describedby="emailHelp" name="end_date">
                        @error('end_date')
                            <p class="text-danger small"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button class="time_calculate" onclick="totalDin();">Calculate Days</button>
                </div>

                <div class=" mb-3">
                    <label for="exampleInputEmail1">Total Days</label>
                    <input type="number" class="form-control" id="totalDays" aria-describedby="emailHelp" name="total_days"
                        readonly>
                    @error('total_days')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
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
