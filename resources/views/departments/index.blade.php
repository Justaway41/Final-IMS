@extends('layouts.adminlayout')

@section('content')
<div class="main">

    <div class="head-over-display">
        Departments
    </div>
    
    <div class="tableBG" style="min-width:40vw">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Department Name</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                <tr class="hover">
                    <th scope="row">{{ $department->department_name }}</th>
                    <td>
                        <form>
                            <a class="createUser" href="{{ route('departments.edit', $department->id) }}">Edit</a>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('departments.create') }}" class="createUser">Create New Department</a>
    </div>
</div>
@endsection
