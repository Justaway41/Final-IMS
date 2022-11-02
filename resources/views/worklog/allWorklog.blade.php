@extends('layouts.layout')

@section('content')
<table class="table bg-light">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Work Done</th>
        <th scope="col">Hours</th>
      </tr>
    </thead>
    <tbody>
    @foreach($work_logs as $worklog)
      <tr>
        <th scope="row">{{ $worklog->user->full_name }}</th>
        <td>{{ $worklog->work }}</td>
        <td>{{ $worklog->hours_worked }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
       
@endsection