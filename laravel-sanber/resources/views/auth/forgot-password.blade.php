@extends('layouts.master')

@section('content')

<form method="POST" action="/forgot-password">
    @csrf
    <label>Email</label>
    <input type="email" name="email" required>
    <button type="submit">Kirim OTP</button>
</form>
@endsection