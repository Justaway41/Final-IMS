@extends('layouts.adminlayout')


@section('content')
<div class="main">

    <div class="head-over-display">
        Todo
    </div>
    {{-- post task form --}}
    <div class="createUser">
        <div>
            <div>
                <form action="{{route('admin.todo.store', $project->id)}}" method="POST">
                    @csrf
                    <div>
                        <label for="assign_to">Assign To</label>
                        <select class="text-black" name="assign_to">
                            @foreach ($users as $user)
                            <option value="{{$user->id}}" class="text-black">
                                {{ $user->email }}
                            </option>
                            @endforeach
                        </select>
                    </div>



                    <div class="mb-3">
                        <label for="deadline">Deadline:</label>
                        <input type="" autocomplete="off" name="deadline" class="datepicker text-black ">
                    </div>

                    <div class="mb-3 border border-black-500">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>>
</div>
@endsection