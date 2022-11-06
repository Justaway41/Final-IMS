@extends('layouts.layout')

@section('content')
    <table class="table bg-light">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Total Hours</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
          <tr>
            <th scope="row">{{ $user->full_name }}</th>
            <td>{{ $user->Worklogs->sum('hours_worked') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection