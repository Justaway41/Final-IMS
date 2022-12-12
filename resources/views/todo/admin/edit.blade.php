@extends('layouts.adminlayout')


@section('content')
<div class="head-over-display">
    Edit Tasks
</div>
<div class="createUser">
    <div class="bigBox">
        <form action="{{route('admin.todo.tasks.update', ['id' => $task->id])}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                            <select name="assign_to">
                                @foreach ($users as $user)
                                <option value="{{$user->email}}">
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
        </form>
    </div>
</div>
@endsection