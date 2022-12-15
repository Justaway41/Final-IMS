@extends('layouts.adminlayout')


@section('content')
    <div class="head-over-display">
        Edit Todo
    </div>

    <div class="tableBG" style="margin: -1rem 10vw 0">
        <form action="{{ route('admin.todo.tasks.update', ['id' => $task->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Assign To</th>
                        <th scope="col">Deadline</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="hover">
                        <td>
                            <div class="mb-3">
                                <input type="text" name="todo" value="{{ $task->todo }}" style="width: 100%">
                            </div>
                        </td>
                        <td>
                            <select class="form-select" name="assign_to">
                                @foreach ($users as $user)
                                    <option value="{{ $user->full_name }}">
                                        {{ $user->full_name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="date" autocomplete="off" name="deadline" value="{{ $task->deadline }}">
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="createUser">Update</button>
        </form>
    </div>
@endsection
