@extends('layouts.layout')

@section('content')
<div class="w-50 h-100 bg-light p-4  d-flex align-items-center flex-column">
  <form method="POST" class="d-flex align-items-center flex-column" action="/user/authenticate" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control loginfeilds" name="email" id="email" placeholder="johnshow@example.com" value="{{old('email')}}">
        @error('email')
        <p class="text-danger fs-1 mt-1"><small>{{$message}}</p></small></p>
        @enderror
      </div>
      <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control loginfeilds" name="password" id="name" placeholder="*******" value="{{old('password')}}">
          @error('password')
          <p class="text-danger fs-1 mt-1"><small>{{$message}}</p></small></p>
          @enderror
        </div>
      <button type="submit" class=" loginbtn  align-self-center  w-20 ">Login</button>
    </form>
    <p class="forgotpassword" ><a href="/forgotpassword" class="customlink">
      Forgot your password ?</p>
      </a> 
</div> 

@endsection