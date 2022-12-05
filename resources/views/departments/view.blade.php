@extends('layouts.adminlayout')

@section('content')
    <div class="viewDepartments">
        @foreach ($departments as $department)
            <a class="dil" href="{{ route('departments.show', $department->id) }}">{{ $department->department_name }}</a>
        @endforeach
    </div>
@endsection
