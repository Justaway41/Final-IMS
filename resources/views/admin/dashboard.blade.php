@extends('layouts.adminlayout')

@section('content')
    <div class="boxmain">
        <div class="box-interns">
            <h2>{{ $totalinterns }}</h2>
            <h2>Intern</h2>
            <span>
                <i class="fa fa-users fa-4x"></i>
            </span>
        </div>

        <div class="box-projects">
            <h2>{{ $projectCount }}</h2>
            <h2>Projects</h2>
            <span>
                <i class="fa fa-pencil-square-o fa-4x"></i>
            </span>
        </div>

        <div class="bigBox">
            <h2 style="text-align: center">Recent Projects</h2>
            <div class="block">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Project Title </th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr class="hover">
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->end_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
