@extends('layouts.adminlayout')


@section('content')
<div class="main">

    <div class="text-black w-screen border border-black-500 p-4">
        <form action="{{route('admin.projects.store')}}" method="POST">
            @csrf
            <div class="mb-3 border border-black-500 p-4">
                <div class="mb-3">
                    <label for="name">Project:</label>
                    <input type="text" name="name" autocomplete="off" class="text-black">
                </div>
                <div class="mb-3 border border-black-500 p-2">
                    <div class="mb-3">
                        <label for="start_date">Start Date: </label>
                        <input type="text" name="start_date" class="datepicker text-black" autocomplete="off">
                    </div>
                    <div>
                        <label for="deadline">Deadline: </label>
                        <input type="text" name="deadline" class="datepicker text-black" autocomplete="off">
                    </div>
                </div>
            </div>
            <div>
                <button type="submit">
                    Add Project
                </button>
            </div>

        </form>
    </div>
</div>
@endsection