@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Missed Worklogs
    </div>

    <div class="tableBG">
        <table class="table" style="width:40vw">
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
@endsection
