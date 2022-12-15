@extends('layouts.adminlayout')

@section('content')
    <div class="head-over-display">
        Todo
    </div>

    <div class="tableBG" style="margin: -1rem 20vw 0">
        <form action="{{ route('admin.todo.store', $project->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="assign_to">Assign To:</label>
                <select class="form-select" name="assign_to">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->full_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="task">Task</label>
                <input type="text" autocomplete="off" name="todo" style="width: 100%">
            </div>

            <div class=" mb-3">
                <label for="deadline">Deadline</label>
                <input type="date" autocomplete="off" name="deadline">
            </div>
            <button class="createUser" type="submit">Create</button>
        </form>
    </div>
@endsection
