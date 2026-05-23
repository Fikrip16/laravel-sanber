@extends('layouts.master')
@section('title')
 Edit Profile
@endsection
@section('content')

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<form action="/profile/{{ $profile->id }}" method="POST">
@csrf
@method('PUT')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
   
    
  <div class="mb-3">
    <label class="form-label" class="form-label">age</label>
    <input type="number" class="form-control" name="age" value="{{ $profile->age }}" >
  </div>

  <div class="mb-3">
    <label for="form-label" class="form-label">address</label>
    <textarea class= "form-control" name="address" id="" cols="30" rows="10">{{ $profile->address }}</textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection

