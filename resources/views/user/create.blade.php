@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Create User
    </div>

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="createUser">
        @csrf
        <div class="createForm">

            <div class="mb-3">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="John Snow" value="{{ old('full_name') }}" name="full_name">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="johnsnow@deerwalk.edu.np" value="{{ old('email') }}" name="email">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Durbar Marg" value="{{ old('address') }}" name="address">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="integer" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="9841567113" value="{{ old('contact') }}" name="contact">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlSelect1">Gender</label>
                <select class="form-control" id="exampleFormControlSelect1" name="gender">
                    <option>-Select One-</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Birthday</label>
                <input type="date" class="form-control" name="birthday">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Department</label>
                <select class="form-control" id="exampleFormControlSelect1" name="department_id">
                    <option>-Select One-</option>
                    @foreach ($departments as $department)
                        <option value={{ $department->id }}>{{ $department->department_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Role</label>
                <select class="form-control" id="exampleFormControlSelect1" name="role_id">
                    <option>-Select One-</option>
                    @foreach ($roles as $role)
                        <option value={{ $role->id }}>{{ $role->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1">Photo</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="photo">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlSelect1">Contract Status</label>
                <select class="form-control" id="exampleFormControlSelect1" name="contract_status">
                    <option>-Select One-</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Contract Start Date</label>
                <input type="date" class="form-control" id="exampleInputEmail1" value="{{ old('contract_start_date') }}"
                    name="contract_start_date">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Contract End Date</label>
                <input type="date" class="form-control" id="exampleInputEmail1" value="{{ old('contract_end_date') }}"
                    name="contract_end_date">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Hourly Rate</label>
                <input type="nunber" class="form-control" id="exampleInputEmail1" value="{{ old('hourly_rate') }}"
                    name="hourly_rate">
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
