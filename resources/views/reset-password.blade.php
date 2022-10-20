@extends('layouts.layout')

@section('content')
    <div class="navlogo">
        <img src="{{ asset('images/navLogo.png') }}" alt="Deerwalk Sifal School Logo">
    </div>

    <form method="POST" class="form" action="{{ url('reset-password') }}">
        @csrf
        <div class="mb-3">
            <input type="hidden" class="form-control" name="token"   value="{{$request->token}}">
     
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email address"
                value="{{ $request->email }}">
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
        <div class="mb-3">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" id="exampleInputPassword1">
            @error('password_confirmation')
                <p class="text-danger small"><small>{{ $message }}</small></p>
            @enderror
        </div>
        <div>
            <button type="submit">Reset Password</button>
        </div>
        
    </form>
@endsection
