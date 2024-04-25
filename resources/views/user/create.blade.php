@extends('layouts.adminlayout')

@section('content')
    <div class="head-over-display">
        Create User
    </div>

    <div class="tableBG" style="margin: -1rem 10vw 0; height: 80vh; overflow-y: auto">
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="createForm">

                <div class="mb-3">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        value="{{ old('full_name') }}" name="full_name">
                    @error('full_name')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        value="{{ old('email') }}" name="email">
                    @error('email')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        value="{{ old('address') }}" name="address">
                    @error('address')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="integer" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        value="{{ old('contact') }}" name="contact">
                    @error('contact')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlSelect1">Gender</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="gender">
                        <option value="">-Select-</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('gender')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1">Birthday</label>
                    <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}">
                    @error('birthday')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1">Department</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="department_id">
                        @if (Auth::user()->role->title == 'Manager')
                            <option value="{{ Auth::user()->department_id }}">
                                {{ Auth::user()->department->department_name }}</option>
                        @else
                            <option value="">-Select-</option>
                            @foreach ($departments as $department)
                                <option value={{ $department->id }}>{{ $department->department_name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('department_id')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1">Role</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="role_id">
                        <option value="">-Select-</option>
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
                        <option value="">-Select-</option>
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
                        value="{{ old('contract_start_date') }}" name="contract_start_date">
                    @error('contract_start_date')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1">Contract End Date</label>
                    <input type="date" class="form-control" id="exampleInputEmail1"
                        value="{{ old('contract_end_date') }}" name="contract_end_date">
                    @error('contract_end_date')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1">Hourly Rate</label>
                    <input type="nunber" class="form-control" id="exampleInputEmail1" value="{{ old('hourly_rate') }}"
                        name="hourly_rate">
                    @error('hourly_rate')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1">PAN Number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('pan_number') }}"
                        name="pan_number">
                    @error('pan_number')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1">Bank Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('bank_name') }}"
                        name="bank_name">
                    @error('bank_name')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1">Bank Account Number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        value="{{ old('bank_account') }}" name="bank_account">
                    @error('bank_account')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="checkbox" style="align-self: center">
                    <input type="checkbox" class="form-check-input" id="checkbox">
                    <label class="form-check-label" for="checkbox">
                        I confirm that all information provided above is true and complete.
                    </label>
                </div>

            </div>

            <div>
                <button type="submit" class="submit">Submit</button>
            </div>

        </form>
    </div>
@endsection
