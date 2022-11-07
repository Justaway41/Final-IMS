@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Edit User
    </div>

    <form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data" class="createUser">
        @csrf
        @method('PATCH')
        <div class="createForm">

            <div class="mb-3">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="{{ $users->full_name }}" name="full_name">
                @error('full_name')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="{{ $users->email }}" name="email">
                @error('email')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="{{ $users->address }}" name="address">
                @error('address')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Phone No</label>
                <input type="integer" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="{{ $users->contact }}" name="contact">
                @error('contact')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlSelect1">Gender</label>
                <select class="form-control" id="exampleFormControlSelect1" name="gender">
                    <option>-Select One-</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('gender')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Birthday</label>
                <input type="date" class="form-control" name="birthday" value="{{ $users->birthday }}">
                @error('birthday')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Department</label>
                <select class="form-control" id="exampleFormControlSelect1" name="department_id">
                    <option>-Select One-</option>
                    @foreach ($departments as $department)
                        <option value={{ $department->id }}>{{ $department->department_name }}</option>
                    @endforeach
                </select>
                @error('department_id')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Role</label>
                <select class="form-control" id="exampleFormControlSelect1" name="role_id">
                    <option>-Select One-</option>
                    @foreach ($roles as $role)
                        <option value={{ $role->id }}>{{ $role->title }}</option>
                    @endforeach
                </select>
                @error('role_id')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1">Photo</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="photo">
                @error('photo')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlSelect1">Contract Status</label>
                <select class="form-control" id="exampleFormControlSelect1" name="contract_status">
                    <option>-Select One-</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                @error('contract_status')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Contract Start Date</label>
                <input type="date" class="form-control" id="exampleInputEmail1"
                    value="{{ $users->contract_start_date }}" name="contract_start_date">
                @error('contract_start_date')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Contract End Date</label>
                <input type="date" class="form-control" id="exampleInputEmail1" value="{{ $users->contract_end_date }}"
                    name="contract_end_date">
                @error('contract_end_date')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Hourly Rate</label>
                <input type="nunber" class="form-control" id="exampleInputEmail1" value="{{ $users->hourly_rate }}"
                    name="hourly_rate">
                @error('hourly_rate')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="checkbox">
                <input type="checkbox" class="form-check-input" id="checkbox" required>
                <label class="form-check-label" for="checkbox">
                    I confirm that all information provided above is true and complete.
                </label>
            </div>

        </div>

        <div>
            <button type="submit" class="submit">Submit</button>
        </div>

    </form>
@endsection
