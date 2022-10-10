@extends('roles.layout')
@section('content')
    <div class="m-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Role Name</h2>
                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('roles.index') }}">Back</a>
                </div>
            </div>
        </div>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role Title</strong>
                        <input type="text" name="title" value="{{ $role->title }}" class="form-control">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>

        </form>
    </div>
@endsection
