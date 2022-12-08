@extends('layouts.adminlayout')

{{-- to display if the task is completed or in-progress --}}
@php
function progress($task){
if($task->completed) return "COMPLETED";
return "
    IN PROGRESS
";
}
@endphp

@section('content')
<div class="main">
    <div>
        <a href="{{route('admin.projects.index')}}" class="flex justify-start hover:text-white">
            <button class="border border-white-500 p-2 mb-3">
                Back
            </button>
        </a>
    </div>
        <div class="bigBox">
            <h1>{{$project->name}}</h1>
            <h1>TODO'S</h1>
            <div class="block">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Task </th>
                            <th scope="col">Assign To</th>
                            <th scope="col">Deadline</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                    @unless ($tasks->isEmpty())
                        @foreach($tasks as $task)
                            <tr class="hover">
                                <td>{{$task->todo}}</td>
                                <td>{{$task->assign_to}}</td>
                                <td>{{$task->deadline}}</td>
                                <td>
                                    <form action="{{route('admin.todo.tasks.delete', ['id' => $task->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mx-2 border border-white p-1">DELETE</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('admin.todo.tasks.edit', ['id'=> $task->id])}}" class="hover:text-white">
                                        <button type="submit" class="mx-2 border border-white p-1 ">
                                            EDIT
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('admin.todo.tasks.updateProgress', ['id' => $task->id])}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="mx-2 border border-white p-1">{{progress($task) }}</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    @endunless
                    </tbody>
                </table>
            </div>
            <div>
                <a href="{{route('admin.todo.create', $project->id)}}" class="hover:text-white">
                    <button class="border border-white-500 p-2">
                        Add Todos
                    </button>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection