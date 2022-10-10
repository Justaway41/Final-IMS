@extends('layouts.layout')

@section('content')
    <div class="m-2">
        <div class="pull-left">
            <h4>Departments</h4>
        </div>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('departments.create') }}">Create New Department</a>
                </div>
            </div>
        </div>
        <br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>{{ $message }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Department Id</th>
                <th>Department Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->department_name }}</td>
                    <td>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('departments.edit', $department->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection