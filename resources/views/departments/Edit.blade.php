@extends('layouts.adminlayout')

@section('content')
<div class="main">
    <div class="head-over-display">
        Edit Department
    </div>
    
    <form action="{{ route('departments.update', $department->id) }}" method="POST" class="createUser">
        @csrf
        @method('PUT')
        <div class="createForm">
            
            <div class="mb-3">
                <label for="exampleInputEmail1">Department Name</label>
                <input type="text" name="department_name" value="{{ $department->department_name }}" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('department_name')
                <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>
        </div>
        
        <div>
            <button type="submit" class="submit">Update</button>
        </div>
    </form>
</div>
@endsection
