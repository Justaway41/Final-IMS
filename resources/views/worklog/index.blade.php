@extends('layouts.layout')

@section('content')

<div class="w-100 bg-light d-flex justify-content-center align-items-center">
  <div class="pb-3">
    @if ($errors->any())
        <div class="danger">
          Something Went Wrong
        </div>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
    @endif
  </div>
    <form action="{{ route('Work_log.store') }}" method="POST" class="w-75">
      
        @csrf
        <div class="form-group ">
            <label for="exampleFormControlTextarea1">Work</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="work"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Start Time</label>
            <input type="time" class="form-control" id="startTime" aria-describedby="emailHelp"  value ="{{ old('start_time') }}"  name="start_time">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">End Time</label>
            <input type="time" class="form-control" id="endTime" aria-describedby="emailHelp" value ="{{ old('end_time') }}"  name="end_time">
          </div>
          <button onclick="timeCalculator()">Calculate Hours</button>
          <div class="form-group">
            <label for="exampleInputEmail1">Total Hours</label>
            <input type="number" class="form-control" id="totalTime" aria-describedby="emailHelp" value ="{{ old('total_time') }}"  name="hours_worked" readonly>
          </div>
          <div class="form-check">
            <p>

              Note: Total Hours cannot exceed 8 hours
            </p>
            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
            <label class="form-check-label" for="exampleCheck1">I understand that work once submitted cannot be edited</label>
          </div>
       
          <div>

              <button type="submit" class=" m-2 btn btn-primary">Submit</button>
          </div>
          
    </form>
</div>



@endsection