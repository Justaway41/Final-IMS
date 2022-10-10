@extends('layouts.layout')
@section('content')
    <div class="m-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Department Name</h2>
                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('departments.index') }}">Back</a>
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

        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Department Name</strong>
                        <input type="text" name="department_name" value="{{ $department->department_name }}"
                            class="form-control">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>

        </form>
    </div>
@endsection
