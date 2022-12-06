@extends('layouts.layout')

@php
    function progress($task){
        if($task->completed) return "COMPLETED";
        return "IN PROGRESS";
    }
@endphp

@section('content')
<div class="text-white">
    <div>
        <a href="/" class="flex justify-start hover:text-white">
            <button class="border border-white-500 p-2 mb-3">
                Back
            </button>
        </a>
    </div>

<div class="flex flex-col space-y-4">
    <p class="w-screen border border-white-500 p-2 mb-2">TODO'S</p>
    @if($tasks->isEmpty())
        <p class="text-3xl">NO TASKS</p>
    @endif

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
                        <form action="{{route('admin.todo.tasks.updateProgress', ['id' => $task->id])}}" id="progressForm" method="POST" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            
                            <button type="submit" class="mx-2 border border-white p-1" id="progressButton">{{progress($task)}}</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            <button class="add text-white border border-white p-1" id="add">CLICK</button>
        </div>
    @endunless



</div>
{{-- not working as intended --}}
    {{-- <script>
        $(document).ready(function(){
            $(document).on('click', '#progressButton', function(e) {
                e.preventDefault();
                var form  = $("#progressForm");
                console.log(form.attr('action'));
                var data = {
                    'progress' : $('#progressButton').html()
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: form.attr('action'),
                    data: data,
                    success: function(response){
                        console.log(response);
                    }
                });
            });
        });
    </script> --}}


@endsection