@extends('layouts.layout')

@section('content')
    <div class="text-white h-screen">
        <div class="mb-3"> 
            @unless (count($projects) == 0)
            @foreach($projects as $project)
                <a href="{{route('admin.projects.show', ['id' => Crypt::encrypt($project->id)])}}" class="hover:text-white">
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
            @endforeach
        @endunless
        </div>
                
        <div>
            <a href="{{route('admin.projects.create')}}">
                <button class="p-2 px-4 ml-2 text-white rounded border border-white-500">
                    Add project
                </button>
            </a>
        </div>
    </div>
@endsection