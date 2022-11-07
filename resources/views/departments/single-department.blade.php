@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        {{ $department->department_name }}
    </div>

    <div class="tableBG">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            @foreach ($users as $user)
                <tbody>
                    <tr class="hover">
                        <th> {{ $user->full_name }} </th>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->contact }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->birthday }}</td>
                        <td>{{ $user->role->title }}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
