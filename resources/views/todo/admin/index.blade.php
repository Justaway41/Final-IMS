@extends('layouts.layout')

@section('content')
    <a  href="{{route('admin.todo.create')}}">
        <button class="text-white">Create</button>
    </a>
@endsection