@extends('layouts.adminlayout')


@section('content')

<div class="main">
    <div>
        <a href="{{route('admin.projects.show', ['id' => $task->project_id])}}" class="flex justify-start hover:text-white">
            <button class="border border-white-500 p-2 mb-3">
                Back
            </button>
        </a>
    </div>
    <div class="bigBox">
        <h1>Edit Tasks</h1>
        <form action="{{route('admin.todo.tasks.update', ['id' => $task->id])}}" method="POST" enctype="multipart/form-data">                     
            @csrf
            @method('PUT')
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
                                    <input type="text" name="todo" value="{{$task->todo}}">
                                </div>
                        </td>
                        <td>
                            <select class="" name="assign_to">
                                @foreach ($users as $user)
                                <option value="{{$user->email}}" class="">
                                    {{ $user->email }}
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="" autocomplete="off" name="deadline" class="datepicker"
                            value="{{$task->deadline}}">
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">EDIT</button>
        </div>
        </form>
    </div>
</div>
@endsection