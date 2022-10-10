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
        <th scope="col">Department</th>
        <th scope="col">Role</th>
        <th scope="col">Contract Status</th>
        <th scope="col">Contract Start Date</th>
        <th scope="col">Contract End Date</th>
        <th scope="col">Hourly Rate</th>
      </tr>
    </thead>
      @foreach ($users as $user)
          <tbody>
              <tr>
                <th scope="row"> <a href="{{ route('users.edit',$user->id) }}">{{ $user->full_name }}</a>  </th>
                <td>{{ $user->email }}</td>
                <td>{{ $user->gender}}</td>
                <td>{{ $user->birthday }}</td>
                <td>{{ $user->contact }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->department->department_name}}</td>
                <td>{{ $user->role->title }}</td> 
                <td>{{ $user->contract_status }}</td>
                <td>{{ $user->contract_start_date }}</td>
                <td>{{ $user->contract_end_date }}</td>
                <td>{{ $user->hourly_rate }}</td>
                <td>
  
                  <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>  
          <a href="{{ route('users.create') }}" class="btn btn-primary w-25 align-self-end">Create User</a>  
          <div class="">
            {{ $users->links() }}
          </div>
</div>
</div>
@endsection