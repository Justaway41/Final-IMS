@extends('layouts.adminlayout')

@section('content')
    <div class="head-over-display">
        Edit User
    </div>

    <div class="tableBG" style="margin: -1rem 10vw 0; height: 80vh; overflow-y: auto">
        <form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data" >
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
                    <select class="form-control" id="exampleFormControlSelect1" name="gender" value="{{ $users->gender }}">
                        <option disabled>-Select One-</option>
                        <option value="{{ $users->gender }}" selected>{{ ucfirst($users->gender) }}</option>
                        <option value="{{ $users->gender == "male" ? "female" : "male" }}">{{ $users->gender == "male" ? "Female" : "Male" }}</option>
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
                    <select class="form-control" id="exampleFormControlSelect1" name="department_id" >
                        <option value="{{ $users->department->id }}" selected>{{ $users->department->department_name }}</option>
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
                        <option value="{{ $users->role->id }}" selected>{{ $users->role->title }}</option>
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
                    <input type="file" class="form-control" id="exampleInputPassword1" name="photo"
                        value="{{asset( 'storage/'.$users->photo) }}">
                    @error('photo')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                    <img src="{{asset('storage/'.$users->photo) }}" alt="" height="100" width="100">

                </div>

                <div class="mb-3">
                    <label for="exampleFormControlSelect1">Contract Status</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="contract_status" value="{{ $users->contract_status }}">
                        <option>-Select One-</option>
                        <option value="{{ $users->contract_status }}" selected>{{ ucfirst($users->contract_status) }}</option>
                        <option value="{{ $users->contract_status == "active" ? "inactive" : "active" }}">{{ $users->contract_status == "active" ? "Inactive" : "Active" }}</option>
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
                    <input type="date" class="form-control" id="exampleInputEmail1"
                        value="{{ $users->contract_end_date }}" name="contract_end_date">
                    @error('contract_end_date')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1">Hourly Rate</label>
                    <input type="nunber" class="form-control" id="exampleInputEmail1"
                        value="{{ $users->hourly_rate }}" name="hourly_rate">
                    @error('hourly_rate')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>
 <div class="mb-3">
    <label for="exampleInputEmail1">PAN Number</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="pan_number">
    @error('pan_number')
        <p class="text-danger small"><small>{{ $message }}</small></p>
    @enderror
</div>

<div class="mb-3">
    <label for="exampleInputEmail1">Bank Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $users->bank_name }}" name="bank_name">
    @error('bank_name')
        <p class="text-danger small"><small>{{ $message }}</small></p>
    @enderror
</div>

<div class="mb-3">
    <label for="exampleInputEmail1">Bank Account Number</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="bank_account">
    @error('bank_account')
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
                <button type="submit" class="submit" id="prevent-multiple-work" >Submit</button>
            </div>

        </form>
    </div>
@endsection
