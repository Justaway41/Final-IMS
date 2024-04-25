@extends('layouts.layout')

@section('content')
<div class="container-fluid my-4 pb-4 mt-5" style="width: 50%;">
    <div class="col px-5 py-4 bg-white rounded">
        <h5 class="text-center py-3">Change Password</h5>
        @if($errors->any())
        {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
        @endif
        @if(Session::get('error') && Session::get('error') != null)
        <div style="color:red">{{ Session::get('error') }}</div>
        @php
        Session::put('error', null)
        @endphp
        @endif
        @if(Session::get('success') && Session::get('success') != null)
        <div style="color:green">{{ Session::get('success') }}</div>
        @php
        Session::put('success', null)
        @endphp
        @endif
        <form class="form" action="{{ route('postChangePassword') }}" method="post">
            <div>
                @csrf
                <div class="mb-3 text-start">
                    <label for="current_password" class="form-label">Current Password</label>
                    <div class=" d-flex ">
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        <button type="button" class="px-2" onclick="togglePassword('current_password')" style="border: none">
                            <i class="fa fa-eye"></i>
                            <i class="fa fa-eye-slash" style="display: none;"></i>
                        </button>
                    </div>
                </div>
                
                <div class="mb-3 text-start">
                    <label for="new_password" class="form-label">New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="new_password" name="new_password">
                        <button type="button" class="px-2" onclick="togglePassword('new_password')" style="border: none">
                            <i class="fa fa-eye"></i>
                            <i class="fa fa-eye-slash" style="display: none;"></i>
                        </button>
                    </div>
                </div>
                
                <div class="mb-3 text-start">
                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                        <button type="button" class="px-2" onclick="togglePassword('new_password_confirmation')" style="border: none">
                            <i class="fa fa-eye"></i>
                            <i class="fa fa-eye-slash" style="display: none;"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn text-center text-white" style="background-color: #172B4D">Submit</button>
            </div>

        </form>
    </div>
</div>

<script>
    function togglePassword(inputId) {
        var inputElement = document.getElementById(inputId);
        var icon = document.querySelector('#' + inputId + ' + button i');
        if (inputElement.type === "password") {
            inputElement.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            inputElement.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endsection
