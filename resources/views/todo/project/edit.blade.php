@extends('layouts.adminlayout')

@section('content')
    <div class="head-over-display">
        Edit Project
    </div>

    <div class="tableBG" style="margin: -1rem 10vw 0">
        <form action="{{ route('admin.projects.update', ['id' => $project->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1>{{ $project->name }}</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Project </th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover">
                        <td>
                            <input type="text" name="name" autocomplete="off" class="text-black"
                                value="{{ $project->name }}">
                        </td>
                        <td>
                            <input type="date" name="start_date" autocomplete="off" value="{{ $project->start_date }}">
                        </td>
                        <td>
                            <input type="date" name="deadline" autocomplete="off" value="{{ $project->end_date }}">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <button type="submit" class="createUser">
                    Edit Project
                </button>
            </div>
        </form>
    </div>
@endsection
