@extends('layouts.adminlayout')

@section('content')
<div class="main">

    <div class="text-black flex flex-col mb-3 border border-black-500 p-4">
        @foreach($tasks as $task)
        <div class="flex">
            <div class="flex flex-col mb-3 border border-black-500 p-4">
                <p>Assign to: {{$task->assign_to}}</p>
                <p>Todo : {{$task->todo}}</p>
                <p>Deadline : {{$task->deadline}}</p>
                <form action="" method="POST">
                    <select name="vals" class=" border border-black-500 p-2">
                        <option value="">
                            Task Progress
                        </option>
                        @foreach ($tasks_completed as $task_completed)
                        <option value="">
                            {{$task_completed}}
                        </option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div>
                <a href="{{route('admin.todo.tasks.edit', ['id' => $task->id])}}">
                    <button class="p-2 px-4 ml-2 text-white bg-black rounded">
                        Edit
                    </button>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection