@extends('layouts.adminlayout')

@section('content')
<div class="main">
    <a href="{{route('admin.todo.create')}}">
        <button class="text-white">Create</button>
    </a>
</div>
@endsection