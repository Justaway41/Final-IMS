@extends('layouts.layout')

@section('content')
    @foreach ($departments as $department)
        <a href="{{ route('departments.show', $department->id) }}">{{ $department->department_name }} </a>
    @endforeach
@endsection
