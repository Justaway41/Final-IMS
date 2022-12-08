@extends('layouts.adminlayout')

@section('content')
<div class="main">

    <div class="text-white">
        <div>
            <a href="{{route('admin.projects.index')}}" class="flex justify-start hover:text-white">
                <button class="border border-white-500 p-2 mb-3">
                    Back
                </button>
            </a>
        </div>
        <form action="{{route('admin.projects.update', ['id' => $project->id])}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 border border-black-500 p-4">
                <div class="mb-3">
                    <label for="name">Project:</label>
                    <input type="text" name="name" autocomplete="off" class="text-black" value="{{$project->name}}">

                </div>
                <div class="mb-3 border border-black-500 p-2">
                    <div class="mb-3">
                        <label for="start_date">Start Date: </label>
                        <input type="text" name="start_date" class="datepicker text-black" autocomplete="off"
                            value="{{$project->start_date}}">
                    </div>
                    <div>
                        <label for="deadline">Deadline: </label>
                        <input type="text" name="deadline" class="datepicker text-black" autocomplete="off"
                            value="{{$project->deadline}}">
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="border border-white p-2">
                    Edit Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection