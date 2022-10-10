@extends('layouts.layout')

@section('content')

  <div class="pb-3">
    @if ($errors->any())
        <div class="danger">
          Something Went Wrong
        </div>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
    @endif
  </div>

  <div class="w-75 bg-light p-4 ">
    <form action="{{ route('users.store') }}" method="POST"  enctype="multipart/form-data" class="w-100 form">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="John Snow" value ="{{ old('full_name') }}"  name="full_name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="johnsnow@deerwalk.edu.np" value ="{{ old('email') }}" name="email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Birthday</label>
            <input type="date" class="form-control" name="birthday">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone No</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="9841567113" value ="{{ old('contact') }}" name="contact">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Durbar Marg, Kathmandu, Nepal" value ="{{ old('address') }}" name="address">
          </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Photo</label>
          <input type="file" class="form-control" id="exampleInputPassword1" name="photo">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Department</label>
            <select class="form-control" id="exampleFormControlSelect1" name="department_id">
              <option>-Select One-</option>
              @foreach ($departments as $department)
              <option value={{ $department->id }}>{{ $department->department_name }}</option> 
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Role</label>
            <select class="form-control" id="exampleFormControlSelect1" name="role_id">
              <option>-Select One-</option>
              @foreach ($roles as $role)
              <option value={{ $role->id }}>{{ $role->title }}</option> 
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Contract Status</label>
            <select class="form-control" id="exampleFormControlSelect1" name="contract_status">
              <option>-Select One-</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Contract Start Date</label>
            <input type="date" class="form-control" id="exampleInputEmail1" value ="{{ old('contract_start_date') }}" name="contract_start_date">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Contract End Date</label>
            <input type="date" class="form-control" id="exampleInputEmail1" value ="{{ old('contract_end_date') }}" name="contract_end_date">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Hourly Rate</label>
            <input type="nunber" class="form-control" id="exampleInputEmail1" value ="{{ old('hourly_rate') }}" name="hourly_rate">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Gender</label>
            <select class="form-control" id="exampleFormControlSelect1" name="gender">
              <option>-Select One-</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          
        <button type="submit" class="grid-remove-btn btn btn-primary">Submit</button>
          </div>
      </form>

  </div>

@endsection