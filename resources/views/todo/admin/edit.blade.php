@extends('layouts.layout')


@section('content')
    {{-- post task form --}}
    <div class="flex text-white">
        <form action="{{route('admin.todo.tasks.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="todo">Todo:</label>
                <input type="text" name="todo" value="{{$task->todo}}">
            </div>
            <div class="mb-3">
                <label for="assign_to">Assign to:</label>
                <input type="text" name="assign_to" value="{{$task->assign_to}}">
            </div>
            <div class="mb-3">
                <label for="deadline">Deadline:</label>
                <input type="" autocomplete="off" name="deadline" id="datepicker" value="{{$task->deadline}}">
            </div>
            <div class="mb-3">
                <button type="submit" class="p-1 px-2 ml-2 rounded">Edit</button>
            </div>

            {{-- <div class="mb3">
                <select name="vals">
                    <option value="">
                    Select Member
                    </option>
                    @foreach ($users as $user)
                    <option value="{{$user->full_name}}">
                        {{$user->full_name}}
                    </option>
                     @endforeach
                </select>
            </div> --}}
            
        </form>
    </div>

@endsection
