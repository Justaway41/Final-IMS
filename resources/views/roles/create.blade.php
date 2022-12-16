@extends('layouts.adminlayout')

@section('content')
    <div class="head-over-display">
        Create New Role
    </div>

    <div class="tableBG" style="margin: -1rem 20vw 0">
        <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="createForm">
                <div class="mb-3">
                    <label for="exampleInputEmail1">Role Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    @error('title')
                        <p class="text-danger small"><small>{{ $message }}</small></p>
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit" class="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
