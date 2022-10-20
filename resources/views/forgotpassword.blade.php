@extends('layouts.layout')

@section('content')
<div class="navlogo">
    <img src="{{ asset('images/navLogo.png') }}" alt="Deerwalk Sifal School Logo">
</div>



<form method="POST" class="form" action="{{ route('password.email') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email address"
            value="{{ old('email') }}">
        @error('email')
            <p class="text-danger small"><small>{{ $message }}</small></p>
        @enderror
    </div>
   <div>
        <button type="submit">Reset password</button>
    </div>
    <div class="forgot-password">
        <a href="/" class="customlink"><small>Alredy have an account ?</small></a>
    </div>
</form>

@endsection