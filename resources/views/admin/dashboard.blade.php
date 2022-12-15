@extends('layouts.adminlayout')

@section('content')
<div class="boxmain">
    <div class="box" style="margin-right: 1em">
        <h1>{{ $totalinterns }}</h1>
        <span>
            <i class="fa fa-users fa-5x"></i>
        </span>
        <h1>Intern</h1>
    </div>

    <div class="box" style="margin-left: 1em">
        <h1 class="total">{{$projectCount}}</h1>
        <span>
            <i class="fa fa-pencil-square-o fa-5x"></i>
        </span>
        <h1>Projects</h1>
    </div>

    <div class="bigBox">
        <h1 style="text-align: center">Recent Projects</h1>
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
                    @foreach($projects as $project)
                    <tr class="hover">
                        <td>{{$project->name}}</td>
                        <td>{{$project->start_date}}</td>
                        <td>{{$project->end_date}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection