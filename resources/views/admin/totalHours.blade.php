@extends('layouts.adminlayout')

@section('content')
<div class="main">

    <div class="head-over-display">
        Total Working Hours
    </div>
    
    <div class="tableBG">
        <table class="table" style="min-width:30vw">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Total Hours</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="hover">
                        <th scope="row">{{ $user->full_name }}</th>
                        <td>{{ $user->MonthlyWorklogs->sum('hours_worked') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        @endsection
