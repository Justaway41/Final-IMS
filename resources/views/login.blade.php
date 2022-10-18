@extends('layouts.layout')

@section('content')
    <div>
        <form method="POST" class="form" action="/user/authenticate" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail1" class="label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ old('email') }}">
                @error('email')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                @error('password')
                    <p class="text-danger small"><small>{{ $message }}</small></p>
                @enderror
            </div>

            <div>
                <button type="submit">Login</button>
            </div>

            <div>
                <a href="/forgotpassword" class="customlink"><small>Forgot your password?</small></a>
            </div>
        </form>
    </div>
@endsection
