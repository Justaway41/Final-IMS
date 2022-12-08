@extends('layouts.adminlayout')

@section('content')
<div class="main">
    <div class="">
        <div>
            <a href="{{route('admin.projects.index')}}" class="">
                <button class="border border-white-500 p-2 mb-3">
                    Back
                </button>
            </a>
        </div>
        
        <div class="bigBox">
            <form action="{{route('admin.projects.update', ['id' => $project->id])}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <h1>{{$project->name}}</h1>
            <div class="block">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Project </th>
                            <th scope="col">Assign To</th>
                            <th scope="col">Deadline</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover">
                            <td>
                                <input type="text" name="name" autocomplete="off" class="text-black" value="{{$project->name}}">
                            </td>
                            <td>
                                <input type="text" name="start_date" class="datepicker text-black" autocomplete="off"
                                value="{{$project->start_date}}">
                            </td>
                            <td>
                                <input type="text" name="deadline" class="datepicker text-black" autocomplete="off"
                                value="{{$project->deadline}}">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button type="submit" class="btn btn-primary">
                        Edit Project
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection