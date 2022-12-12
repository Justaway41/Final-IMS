@extends('layouts.adminlayout')

@section('content')
<div class="head-over-display">
    Add Project
</div>
<div class="tableBG">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Project Name</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>

        <tbody>
            @foreach($projects as $project)
            <tr class="hover">
                <th title="Update"><a class="edituser" href="{{route('admin.projects.show', ['id' => $project->id])}}">
                        {{$project->name}}</a></th>
                <td>{{$project->start_date}}</td>
                <td> {{$project->end_date}}</td>

                <td>
                    <form action="{{route('admin.projects.delete', $project->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete" type="submit">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('admin.projects.create')}}" class="btn btn-primary">Add Project</a>
</div>
@endsection