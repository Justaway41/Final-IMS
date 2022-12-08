@extends('layouts.adminlayout')


@section('content')
<div class="main">
    <div>
        <a href="{{route('admin.projects.index')}}" class="">
            <button class="border border-white-500 p-2 mb-3">
                Back
            </button>
        </a>
    </div>
    
    <div class="bigBox">
        <form action="{{route('admin.projects.store')}}" method="POST">
            @csrf
        <h1>PROJECT</h1>
        <div class="block">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Project </th>
                        <th scope="col">Department</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Deadline</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover">
                        <td>
                            <input type="text" name="name" autocomplete="off" class="text-black">
                        </td>
                        <td>
                            <select class="text-black" name="department">
                                @foreach ($departments as $department)
                                <option value=" {{$department->department_name}}" class="text-black">
                                    {{ $department->department_name }}
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" name="start_date" class="datepicker text-black" autocomplete="off">
                        </td>
                        <td>
                            <input type="text" name="deadline" class="datepicker text-black" autocomplete="off">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <button type="submit" class="btn btn-primary">
                    Add Project
                </button>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection