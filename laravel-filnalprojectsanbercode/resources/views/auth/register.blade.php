@extends('layouts.master')
@section('title'  )
register
@endsection
@section('content')

<form action="/register" method="POST">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @csrf
  <div class="mb-3">
    <label class="form-label" class="form-label">username</label>
    <input type="text" class="form-control" name="name" >
  </div>
  <div class="mb-3">
    <label for="form-label" class="form-label">email</label>
   <input type="email" class ="form-control" name="email">
  </div>
  <div class="mb-3">
    <label for="form-label" class="form-label">password</label>
   <input type="password" class ="form-control" name="password">
  </div>
  <div class="mb-3">
    <label for="form-label" class="form-label">password confirmation</label>
   <input type="password" class ="form-control" name="password confirmation">
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection
