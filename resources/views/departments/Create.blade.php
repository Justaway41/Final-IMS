@extends('layouts.adminlayout')

@section('content')
    <div class="main">

        <div class="head-over-display">
            Create New Department
        </div>

        <form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data" class="createUser">
            @csrf
            <div class="createForm">

                <div class="mb-3">
                    <label for="exampleInputEmail1">Department Name</label>
                    <input type="text" name="department_name" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    @error('department_name')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1">Department Email</label>
                    <input type="email" name="department_email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    @error('department_email')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit" class="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
