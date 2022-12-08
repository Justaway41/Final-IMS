@extends('layouts.adminlayout')

@section('content')
<div class="head-over-display">
    Add Project
</div>

<div class="add-project createUser">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('admin.projects.store')}}" method="POST">
        @csrf
        <div class="mb-3 border border-black-500 p-4">
            <div class="mb-3">
                <label for="name">Project:</label>
                <input type="text" name="name" autocomplete="off" class="text-black">
            </div>
        </div>
        <div class="mb-3 border border-black-500 p-2">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Start Date:</label>
                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="start_date">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">End Date:</label>
                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="end_date">
            </div>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">
                Add Project
            </button>
        </div>
    </form>
</div>
@endsection