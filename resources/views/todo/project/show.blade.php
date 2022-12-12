@extends('layouts.adminlayout')

{{-- to display if the task is completed or in-progress --}}
@php
function progress($task){
if($task->completed){
return "COMPLETED";
}
return "IN PROGRESS";
}
@endphp

@section('content')
<div class="head-over-display">
    TO-DO
</div>
<div class="createUser">
    <div class="flex flex-col mb-3 ">
        <div class="d-flex justify-content-start">
            <p>

                <span class="bigText">PROJECT: </span>
                {{$project->name}}
            </p>
        </div>
        <div class="d-flex justify-content-between">
            <p>

                <span class="bigText">START DATE: </span>
                {{$project->start_date}}
            </p>
            <p>

                <span class="bigText">DEADLINE: </span>
                {{$project->end_date}}
            </p>

        </div>
    </div>

    <div class="flex flex-col space-y-4">
        <h2 class="">TODO'S</h2>
    </div>



    <table class="table">
        <thead>
            <tr>
                <th scope="col">Assigned To</th>
                <th scope="col">Work</th>
                <th scope="col">Deadline</th>
                <th scope="col" colspan=2>Actions</th>
                <th scope="col">Status</th>

            </tr>
        </thead>
        <tbody>

            @foreach($tasks as $task)
            <tr class="hover">
                <td>
                    {{$task->assign_to}}
                </td>
                <td>
                    {{$task->todo}}
                </td>
                <td>
                    {{$task->deadline}}
                </td>
                <td>
                    <form action="{{route('admin.todo.tasks.delete', ['id' => $task->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </td>
                <td>

                    <a href="{{route('admin.todo.tasks.edit', ['id'=> $task->id])}}" class="hover:text-white">
                        <button type="submit" class="btn btn-info">
                            EDIT
                        </button>
                    </a>
                </td>
                <td>
                    <form action="{{route('admin.todo.tasks.updateProgress', ['id' => $task->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="leave_status p-2 {{ $task->completed  ? 'green' : 'yellow' }}"
                            style="border: none; border-radius: 0.65rem;">{{progress($task) }}</button>
                    </form>
                </td>


            </tr>
            @endforeach
        </tbody>

    </table>

    <div>
        <a href="{{route('admin.todo.create', $project->id)}}" class="hover:text-white">
            <button class="border border-white-500 p-2">
                Add Todos
            </button>
        </a>
    </div>


</div>


</div>
@endsection