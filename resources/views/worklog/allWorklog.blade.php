@extends('layouts.adminlayout')

@section('content')
<div class="main">

    <div class="head-over-display">
        Worklogs
    </div>

    <div class="tableBG" style="min-width:40vw">
        <form class="d-flex align-items-center justify-content-end gap-3" method="GET"
            action="{{ route('Work_log.index') }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <select class="form-select" aria-label="Default select example" name="fullname">
                    @foreach($users as $user)
                    <option selected>-- Select Name --</option>
                    <option value="{{ $user->full_name }}">{{ $user->full_name }}</option>

                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">From</label>
                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="start_date">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">To</label>
                <input type="date" class="form-control" id="exampleInputPassword1" name="end_date">
            </div>
            <div class="form-group align-self-end">

                <button type="submit" class=" btn btn-primary">Submit</button>
            </div>
        </form>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Intern Name</th>
                    <th scope="col">Work Done</th>
                    <th scope="col">Hours worked</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($work_logs as $worklog)
                <tr class="hover">
                    <th scope="row">{{ $worklog->user->full_name }}</th>
                    <td>{{ $worklog->work }}</td>
                    <td>{{ $worklog->hours_worked }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection