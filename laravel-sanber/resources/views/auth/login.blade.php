@extends('layouts.master')

@section('title', 'Halaman Login')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px; border-radius: 12px;">
        <h3 class="text-center mb-3">Login</h3>
        <hr class="mb-4" style="width: 50px; border-top: 3px solid green; margin-left: auto; margin-right: auto;">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Masukkan email" required>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Submit</button>
        </form>

        <div class="text-center mt-3">
            <small>Belum punya akun? <a href="/register">Daftar di sini</a></small>
        </div>
        <div class="text-center mt-3">
            <small>Lupas Password <a href="/forgot-password">Lupa Password</a></small>
        </div>
    </div>
</div>
@endsection
