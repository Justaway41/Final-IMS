@extends('layouts.layout')

@section('content')
    <div class="logo">
        <img src="{{ asset('images/navLogo.png') }}" alt="Deerwalk Sifal School Logo">
    </div>

    <form method="POST" class="login_form" action="/login" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email address"
                value="{{ old('email') }}">
            @error('email')
                <p class="text-danger small"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" id="exampleInputPassword1">
            @error('password')
                <p class="text-danger small"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
        <div class="forgot-password">
            <a href="{{ route('password.request') }}" class="customlink"><small>Forgot your password?</small></a>
        </div>
    </form>
@endsection
