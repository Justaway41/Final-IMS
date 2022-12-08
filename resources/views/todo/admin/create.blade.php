@extends('layouts.adminlayout')


@section('content')
<div class="main">
    <div>
        <a href="{{route('admin.projects.show', ['id' => $project->id])}}" class="flex justify-start hover:text-white">
            <button class="border border-white-500 p-2 mb-3">
                Back
            </button>
        </a>
    </div>
    <div class="bigBox">
        <h1>Create Tasks</h1>
        <form action="{{route('admin.todo.store', $project->id)}}" method="POST">
            @csrf
        <div class="block">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Todo </th>
                        <th scope="col">Assign To </th>
                        <th scope="col">Deadline </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover">
                        <td>
                                <div class="mb-3">
                                    <input type="text" name="todo">
                                </div>
                        </td>
                        <td>
                            <select class="text-black" name="assign_to">
                                @foreach ($users as $user)
                                <option value="{{$user->id}}" class="text-black">
                                    {{ $user->email }}
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="" autocomplete="off" name="deadline" class="datepicker">
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
        </form>
    </div>
</div>
@endsection