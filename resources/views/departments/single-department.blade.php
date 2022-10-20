@extends('layouts.layout')


@section('content')

<div class=" container-fluid d-flex mt-4 w-75 ">
  <div class="table w-100 d-flex flex-column  align-items-center bg-light">

  <table class="table  table-light">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Birthday</th>
        <th scope="col">Phone No</th>
        <th scope="col">Address</th>
        <th scope="col">Role</th>

      </tr>
    </thead>
    @foreach ($users as $user)
          <tbody>
              <tr>
                <th scope="row"> {{ $user->full_name }}  </th>
                <td>{{ $user->email }}</td>
                <td>{{ $user->gender}}</td>
                <td>{{ $user->birthday }}</td>
                <td>{{ $user->contact }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->role->title }}</td> 
              </tr>
            </tbody>
            @endforeach
          </table>  
         
         
</div>
</div>
@endsection