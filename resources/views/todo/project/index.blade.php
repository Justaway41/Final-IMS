@extends('layouts.adminlayout')

@section('content')
<div class="main">
   {{-- 123 --}}
    <div class="">
        <div class="bigBox">
            <h1>Projects</h1>
            <div class="block">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Project Title </th>
                            <th scope="col">Department</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Deadline</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                    @unless (count($projects) == 0)
                        @foreach($projects as $project)
                            <tr class="hover">
                                <td>{{$project->name}}</td>
                                <td>{{$project->department}}</td>
                                <td>{{$project->start_date}}</td>
                                <td>{{$project->deadline}}</td>
                                <td>
                                    <a href="{{route('admin.projects.show', ['id' => $project->id])}}" class="hover:text-white">
                                        <button class="border border-white-500 p-2">
                                            Tasks
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('admin.projects.edit',['id' => $project->id])}}" class="">
                                        <button class="border border-white p-2">
                                            Edit
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('admin.projects.delete', $project->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border border-white-500 p-2">DELETE</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    @endunless
                    </tbody>
                </table>
            </div>
            <div>
                <a href="{{route('admin.projects.create')}}">
                    <button class="btn btn-primary">
                        Add project
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection