@extends('layouts.layout')

@section('content')

<div class="w-100 bg-light d-flex justify-content-center align-items-center">
    <form class="w-75">
      
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
            <label for="exampleInputEmail1">Total Time</label>
            <input type="number" class="form-control" id="totalTime" aria-describedby="emailHelp" value ="{{ old('total_time') }}"  name="end_time">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Total Hours</label>
            <div class="totalhours">

            </div>
          </div>  
          <div>

              <button type="submit" class=" m-2 btn btn-primary">Submit</button>
          </div>
          
    </form>
</div>



@endsection