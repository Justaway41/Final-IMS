@extends('layouts.adminlayout')

@section('content')
<div class="main">

    <div class="head-over-display">
        Edit Role
    </div>
    
    <form action="{{ route('roles.update', $role->id) }}" method="POST" class="createUser">
        @csrf
        @method('PUT')
        <div class="createForm">
            
            <div class="mb-3">
                <label for="exampleInputEmail1">Role Title</label>
                <input type="text" name="title" value="{{ $role->title }}" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
                @error('title')
                <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>
        </div>
        
        <div>
            <button type="submit" class="submit">Update</button>
        </div>
    </form>
</div>
@endsection
