@extends('layouts.master')
@section('title'  )
register
@endsection
@section('content')



<form method="POST" action="{{ route('reset.password.submit') }}">
    @csrf
    <input type="hidden" name="email" value="{{ $email }}">
    <div class="mb-3">  
    <label>Password Baru</label>
    <input type="password" name="password" required>
    </div>
    <div class="mb-3">
    <label> confirm Password    </label>
    <input type="password" name="password_confirmation" required>
    </div>
    <button type="submit">Reset Password</button>
</form>
@endsection
<div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Masukkan email" required>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
            </div>