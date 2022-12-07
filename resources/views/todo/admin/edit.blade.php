@extends('layouts.adminlayout')


@section('content')
{{-- post task form --}}
<div class="main">

    <div class="text-white ">
        <a href="{{route('admin.projects.show', ['id' => $task->project_id])}}"
            class="flex justify-start hover:text-white">
            <button class="border border-white-500 p-2 mb-3">
                Back
            </button>
        </a>
    </div>
    <div class="flex text-white border border-white p-2">
        <form action="{{route('admin.todo.tasks.update', ['id' => $task->id])}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="todo">Todo:</label>
                <input type="text" name="todo" value="{{$task->todo}}" class="text-black">
            </div>
            <div class="mb-3">
                <label for="assign_to">Assign to:</label>
                <input type="text" name="assign_to" value="{{$task->assign_to}}" class="text-black">
            </div>
            <div class="mb-3">
                <label for="deadline">Deadline:</label>
                <input type="" autocomplete="off" name="deadline" class="datepicker text-black"
                    value="{{$task->deadline}}">
            </div>
            <div class="mb-3 border border-white-500 p-2">
                <button type="submit" class="p-1 px-2 ml-2 rounded">Edit</button>
            </div>
        </form>
    </div>

</div>
@endsection