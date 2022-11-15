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
                    <th scope="col">From date</th>
                    <th scope="col">To date</th>
                    <th scope="col">Days</th>
                    <th colspan="2"></th>
                </tr>
            </thead>

            @foreach ($users as $user)
                @foreach ($user->MonthlyLeaves->where('status', 'pending') as $leave)
                    <tbody>
                        <tr class="hover">
                            <th scope="row">{{ $leave->user->full_name }}</th>
                            <td>{{ $leave->reason }}</td>
                            <td>{{ $leave->start_date }}</td>
                            <td>{{ $leave->end_date }}</td>
                            <td>{{ $leave->total_days }}</td>
                            <form action="{{ route('leaves.edit', $leave->id) }}">
                                @csrf
                                <td>
                                    <button class="btn btn-success" value="approved" name="status">Approve</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger" value="rejected" name="status">Reject</button>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                @endforeach
            @endforeach
        </table>
    </div>
@endsection
