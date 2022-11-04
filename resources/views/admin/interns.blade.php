@extends('layouts.layout')

@section('content')

<table class="table bg-light">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach($interns as $intern)
      <tr>
      <th scope="row">{{ $intern->full_name}}</th>
      <td>
          <a href="{{ route('Work_log.show',$intern->id) }}" class="btn btn-primary">Add Worklog</a>
      </td>
    </tr>
      @endforeach
</tbody>
@endsection