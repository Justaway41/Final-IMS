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
<div class="head-over-display">
    TO-DO
</div>
<div class="tableBG">

    <div class="text-white">
        <div class="flex flex-col mb-3 ">
            <div>
                <span>PROJECT: </span>
                {{$project->name}}
            </div>
            <div class="flex justify-between m-2">
                <div class=" border border-white p-2">
                    <span>START DATE: </span>
                    {{$project->start_date}}
                </div>
                <div class=" border border-white p-2">
                    <span>DEADLINE: </span>
                    {{$project->end_date}}
                </div>
            </div>
        </div>

        <div class="flex flex-col space-y-4">
            <p class="w-screen border border-white-500 p-2 mb-2">TODO'S</p>
            {{-- {{$tasks}} to get tasks related to the current project --}}


            @unless ($tasks->isEmpty())
            <div class="flex flex-col">
                @foreach($tasks as $task)
                <div class="flex justify-between mx-4 mb-3">
                    <div>
                        <span>ASSIGN TO: </span>
                        {{$task->assign_to}}
                    </div>
                    <div>
                        <span>TODO: </span>
                        {{$task->todo}}
                    </div>
                    <div>
                        <span>DEADLINE </span>
                        {{$task->deadline}}
                    </div>
                    <div class="flex">
                        <form action="{{route('admin.todo.tasks.delete', ['id' => $task->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mx-2 border border-white p-1">DELETE</button>
                        </form>
                        <a href="{{route('admin.todo.tasks.edit', ['id'=> $task->id])}}" class="hover:text-white">
                            <button type="submit" class="mx-2 border border-white p-1 ">
                                EDIT
                            </button>
                        </a>
                        <form action="{{route('admin.todo.tasks.updateProgress', ['id' => $task->id])}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="mx-2 border border-white p-1">{{progress($task) }}</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @endunless


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