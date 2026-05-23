@extends('layouts.master')
@section('title'  )
 edit
@endsection
@section('content',)
<form action="/genre/{{ $genre->id}}" method="POST">
@method("PUT")
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
    <label class="form-label" class="form-label">genre name</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $genre->name) }}">
  </div>
  <div class="mb-3">
    <label for="form-label" class="form-label">genre description</label>
    <textarea class= "form-control" name="description" id="" cols="30" rows="10">{{ $genre->description }}</textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
