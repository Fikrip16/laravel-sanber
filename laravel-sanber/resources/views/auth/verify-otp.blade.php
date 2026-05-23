@extends('layouts.master')

@section('content')

@if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="container">
        <h1>Verifikasi OTP</h1>
        <form method="POST" action="{{ route('verify-otp') }}">
            @csrf
            <input type="text" name="otp" placeholder="Masukkan kode OTP">
            <button type="submit">Verifikasi</button>
        </form>
    </div>


@endsection


