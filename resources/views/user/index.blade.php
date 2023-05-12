@extends('layouts.adminlayout')

@section('content')
    <div class="head-over-display">
        Interns
    </div>

    <div class="tableBG" style="overflow-x:auto; width: 85vw">
        @if ($message = Session::get('success'))
            <p style="color: green; margin: 0">{{ $message }}</p>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Birthday</th>
                    @if (Auth::user()->role->title == 'Admin')
                        <th scope="col">Department</th>
                        <th scope="col">Role</th>
                        <th scope="col">Contract Status</th>
                    @endif
                    <th scope="col">Contract Start Date</th>
                    <th scope="col">Contract End Date</th>
                    <th scope="col">Hourly Rate</th>
                    <th scope="col">PAN Number</th>
                    <th scope="col">Bank Name</th>
                    <th scope="col">Bank Account</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach ($users as $user)
                <tbody>
                    <tr class="hover">
                        <th title="Update"><a class="edituser"
                                href="{{ route('users.edit', $user->id) }}">{{ $user->full_name }}</a></th>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->contact }}</td>
                        <td>{{ ucfirst($user->gender) }}</td>
                        <td>{{ $user->birthday }}</td>
                        @if (Auth::user()->role->title == 'Admin')
                            <td>{{ $user->department->department_name }}</td>
                            <td>{{ $user->role->title }}</td>
                            <td>{{ $user->contract_status }}</td>
                        @endif
                        <td>{{ $user->contract_start_date }}</td>
                        <td>{{ $user->contract_end_date }}</td>
                        <td>{{ $user->hourly_rate }}</td>
                        @if ($user->pan_number != null)
                            <td>{{ Crypt::decryptString($user->pan_number) }}</td>
                            <td>{{ $user->bank_name }}</td>
                            <td>{{ Crypt::decryptString($user->bank_account) }}</td>
                        @endif
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="delete" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {{ $users->links() }}
        <a href="{{ route('users.create') }}" class="createUser">Create User</a>
    </div>
@endsection
