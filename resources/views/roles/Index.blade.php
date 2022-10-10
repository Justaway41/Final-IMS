@extends('roles.layout')

@section('content')
    <div class="m-2">
        <div class="pull-left">
            <h4>Roles</h4>
        </div>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('roles.create') }}">Create New Role</a>
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
                <th>Role Id</th>
                <th>Role Title</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->title }}</td>
                    <td>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
