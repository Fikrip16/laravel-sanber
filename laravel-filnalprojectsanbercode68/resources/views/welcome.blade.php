@extends ('layouts.master')
@section('title')
 HOME
@endsection
@section('content')

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif


@auth
    <h1>SELAMAT DATANG {{ Auth()->user()->name}}</h1>
    @endauth
    <h2>Terima kasih telah bergabung di Sanberbook. Social Media kita bersama</h2> 
@endsection
