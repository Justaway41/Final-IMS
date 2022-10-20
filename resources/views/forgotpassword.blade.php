@extends('layouts.layout')

@section('content')
    <div class="logo">
        <img src="{{ asset('images/navLogo.png') }}" alt="Deerwalk Sifal School Logo">
    </div>

    <form method="POST" class="login_form" action="{{ route('password.email') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email address"
                value="{{ old('email') }}">
            @error('email')
                <p class="text-danger small"><small>{{ $message }}</small></p>
            @enderror
        </div>

        <p class="text-danger small" id="display"></p>

        <div>
            <button type="submit" onclick="popup_link()">Send link</button>
        </div>
        <div class="forgot-password">
            <a href="/" class="customlink"><small>Login instead!</small></a>
        </div>
    </form>
@endsection
