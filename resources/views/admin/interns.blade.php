@extends('layouts.adminlayout')

@section('content')
    <div class="main">

        <div class="head-over-display">
            Missed Worklogs
        </div>

        <div class="tableBG" style="margin: -1rem 20vw 0">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($interns as $intern)
                        <tr class="hover">
                            <th scope="row">{{ $intern->full_name }}</th>
                            <td>
                                <a href="{{ route('Work_log.show', $intern->id) }}" class="createUser">Add Worklog</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
