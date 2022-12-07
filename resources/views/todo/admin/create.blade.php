@extends('layouts.adminlayout')


@section('content')
<div class="main">

    {{-- post task form --}}
    <div class="text-white border border-black-500 mb-3">
        <div>
            <p class="border border-black-500">TO DO'S</p>
            <div>
                <form action="{{route('admin.todo.store', $project->id)}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="todo">Todo:</label>
                        <input type="text" name="todo" class="text-black">
                    </div>

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
                        <button class="" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>>
</div>
@endsection