@extends('layouts.master')
@section('title'  )
HOME
@endsection
@section('content',)

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

@if(session('danger'))
<div class="alert alert-danger">
{{ session('danger') }}
</div>
@endif

@auth
<h1>Selamat datang {{ Auth()->user()->name }}
@if(Auth()->user()->profile)
({{ Auth()->user()->profile->age }} tahun)
@else
    
    @endif
@endauth



    <h1>BukuCerdas</h1>
    <h2>Tempat Membaca Yang Santai Berkualitas</h2>
    <p>Belajar dan Berbagi agar hidup ini semakin santai Berkualitas</p>

    <h3>Benefit User di BukuCerdas</h3>
    <ul>
    <li>Mendapatkan motivasi dari sesama pembaca</li>
    <li>Sharing knowledge dari para pembaca</li>
    <li>web ini dibuat oleh developer profesional</li>
     </ul>

    <h3>Cara Bergabung ke BukuCerdas</h3>
   <ol>
    <li>mengunjungi Website ini</li>
    <li>Mendaftar di halaman register<a href="/register"> Register</a></li>
    <li>Selesai!</li>
   </ol>
@endsection
   