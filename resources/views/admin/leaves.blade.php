@extends('layouts.layout')

@section('content')
<div class="head-over-display">
    Verify Leaves
</div>
<div class="tableBG">

    <table class="table" style="min-width:30vw">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Reason</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Total Days</th>
                <th></th>
                <th></th>



                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="hover">
                @foreach($user->MonthlyLeaves->where('status','pending') as $leave)
                <th scope="row">{{ $leave->user->full_name }}</th>
                <td>{{ $leave->reason }}</td>

                <td>{{ $leave->start_date }}</td>
                <td>{{ $leave->end_date }}</td>
                <td>{{ $leave->total_days }}</td>
                <form action="{{ route('leaves.edit',$leave->id) }}">
                    @csrf
                    <td>
                        <button class="btn btn-success" value="approved" name="status">

                            Approve
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger" value="rejected" name="status">

                            Reject
                        </button>
                    </td>
                </form>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection