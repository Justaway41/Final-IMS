@extends('layouts.adminlayout')

@section('content')
<div class="head-over-display">
    Verify Leaves
</div>

<div class="tableBG" style="margin: -1rem 10vw 0">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Reason</th>
                <th scope="col">From date</th>
                <th scope="col">To date</th>
                <th scope="col">Days</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>

        @foreach ($users as $user)
        @foreach ($user->MonthlyLeaves as $leave)
        <tbody>
            <tr class="hover">
                <th scope="row">{{ $leave->user->full_name }}</th>
                <td>{{ $leave->reason }}</td>
                <td>{{ $leave->start_date }}</td>
                <td>{{ $leave->end_date }}</td>
                <td>{{ $leave->total_days }}</td>
                @if($leave->status == "pending")
                <form action="{{ route('leaves.edit', $leave->id) }}">
                    @csrf
                    <td>
                        <button class="btn btn-success" value="approved" name="status">Approve</button>
                    </td>
                    <td>
                        <button class="btn btn-danger" value="rejected" name="status">Decline</button>
                    </td>
                </form>
                @else
                <td colspan="2">
                    <center>

                        <span
                            class=" mybtun {{ $leave->status == 'approved' ? 'green' : ($leave->status == 'rejected' ? 'red' : 'yellow') }}">

                            {{ ucfirst($leave->status) }}
                        </span>
                    </center>




                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
        @endforeach
    </table>
</div>
@endsection