@extends('layouts.master')
@section('title'  )
register
@endsection
@section('content')



<form method="POST" action="{{ route('reset.password.submit') }}">
    @csrf
    <input type="hidden" name="email" value="{{ $email }}">
    <div class="mb-3">  
    <label> New Password </label> 
    <input type="password" name="password" required>
    </div>
    <div class="mb-3">
    <label> Confirm Password </label>
    <input type="password" name="password_confirmation" required>
    </div>
    <button type="submit">Reset Password</button>
</form>
@endsection
