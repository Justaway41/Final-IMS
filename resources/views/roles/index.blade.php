@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Roles
    </div>

    <div class="tableBG" style="min-width:40vw">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Role Title</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr class="hover">
                        <th scope="row">{{ $role->title }}</th>
                        <td>
                            <form>
                                <a class="createUser" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('roles.create') }}" class="createUser">Create New Role</a>
    </div>
@endsection
