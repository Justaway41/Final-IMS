@extends('layouts.layout')

@section('content')
    <div class="head-over-display">
        Departments
    </div>
    <div class="viewDepartments">
        @foreach ($departments as $department)
            <a class="
            @switch($loop->iteration)
               @case(1)
                 one
               @break
             
               @case(2)
                 two
               @break
             
               @case(3)
                 three
               @break
             
               @default
                 four
             @endswitch
         "
                href="{{ route('departments.show', $department->id) }}">{{ $department->department_name }} </a>
        @endforeach
    </div>
@endsection
