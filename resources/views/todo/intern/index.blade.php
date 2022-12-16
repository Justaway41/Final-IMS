@extends('layouts.layout')

@php
    function progress($task)
    {
        if ($task->completed) {
            return 'Completed';
        }
        return 'In Progress';
    }
@endphp

@section('content')
    <div class="head-over-display">
        TODOs
    </div>

    <div class="worklog">
        <div class="tableBG">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr class="hover">
                            <td>
                                {{ $task->todo }}
                            </td>
                            <td>
                                {{ $task->deadline }}
                            </td>
                            <td>
                                <form action="{{ route('admin.todo.tasks.updateProgress', ['id' => $task->id]) }}"
                                    id="progressForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="leave_status p-1 {{ $task->completed ? 'green' : 'yellow' }}"
                                        style="border: none; border-radius: 0.65rem;"
                                        id="progressButton">{{ progress($task) }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
