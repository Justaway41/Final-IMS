@extends('layouts.layout')

@section('content')
<div class="main bg-light">

    <h1>This is the worklog of all interns</h1>
    <table class="table">
        <thead>
            <tr class="table-success">
                <th scope="col">Name</th>
        <th scope="col">Work Done</th>
        <th scope="col">Hours Worked</th>
    </tr>
</thead>
<tbody>
    <tr>
        <th>{{ $work_logs->user->full_name }}</th>
        <td>{{ $work_logs->work }}</td>
        <td>{{ $work_logs->hours_worked }}</td>
        
    </tr>
    
    
</tbody>
</table>
</div>
@endsection