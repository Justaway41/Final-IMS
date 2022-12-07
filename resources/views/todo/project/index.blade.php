@extends('layouts.adminlayout')

@section('content')
<div class="main">

    <div class="text-white h-screen">
        <div class="mb-3">
            @unless (count($projects) == 0)
            @foreach($projects as $project)
            <div class="flex space-x-3">
                <a href="{{route('admin.projects.show', ['id' => $project->id])}}" class="hover:text-white">
                    <div class="flex flex-col mb-3 border border-white p-2">
                        <div>
                            <span>PROJECT: </span>
                            {{$project->name}}
                        </div>
                        <div class="flex space-x-4">
                            <div>
                                <span>START DATE: </span>
                                {{$project->start_date}}
                            </div>
                            <div>
                                <span>DEADLINE: </span>
                                {{$project->deadline}}
                            </div>
                        </div>
                    </div>
                </a>
                <div>
                    <a href="{{route('admin.projects.edit',['id' => $project->id])}}" class="hover:text-white">
                        <button class="border border-white p-2">
                            Edit
                        </button>
                    </a>
                </div>
                <div>
                    <form action="{{route('admin.projects.delete', $project->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border border-white-500 p-2">DELETE</button>
                    </form>
                </div>
            </div>
            @endforeach
            @endunless
        </div>

        <div>
            <a href="{{route('admin.projects.create')}}">
                <button class="btn btn-primary">
                    Add project
                </button>
            </a>
        </div>
    </div>
</div>
@endsection