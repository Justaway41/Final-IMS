@extends('layouts.adminlayout')

@section('content')
<div class="main">

    <div class="head-over-display">
        Total Working Hours
    </div>
    
    <div class="tableBG">
        <form class="d-flex align-items-center justify-content-end gap-3" method="GET"
        action="{{ route('totalhours') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">From</label>
            <input type="text" id="nepali-datepicker" placeholder="Select Nepali Date"/>
        </div>
        <input type="hidden" id="eng_date" name="start_date" value="{{ old('start_date') }}"/>
        <div class="form-group">
            <label for="exampleInputEmail1">To</label>
            <input type="text" id="nepali-datepicker2" placeholder="Select Nepali Date"/>
        </div>
        <input type="hidden" id="eng_date2" name="end_date" value="{{ old('end_date') }}/>

        <div class="form-group align-self-end">

            <button type="submit" class=" btn btn-primary">Submit</button>
        </div>
    </form>
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
                        @if ($startDate != 0 && $endDate != 0)
                            <td>{{ $user->ManualWorklog($startDate,$endDate)->sum('hours_worked') }}</td>
                        @else
                            <td>{{ $user->MonthlyWorklogs->sum('hours_worked') }}</td>
                        
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        @endsection
