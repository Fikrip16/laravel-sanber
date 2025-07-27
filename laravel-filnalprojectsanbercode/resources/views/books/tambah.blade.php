@extends('layouts.master')
@section('title'  )
 tambah books
@endsection
@section('content')
<form action="/books" method="POST" enctype="multipart/form-data">
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
    <label class="form-label" class="form-label">genre</label>
    <select name="genre_id" id=""  class="form-control" value="{{ old('genre') }}">
    <option value ="">--Pilih Genre--</option>
    @forelse ($genres as $item)
    <option value = "{{ $item->id }}">{{ $item->name }}</option>
    @empty
    <option value ="">Genre belum ada</option>
    @endforelse
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label" class="form-label">books title</label>
    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
  </div>
  <div class="mb-3">
    <label for="form-label" class="form-label">books summary</label>
    <textarea class= "form-control" name="summary" >{{ old('summary') }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label" class="form-label">image</label>
    <input type="file" class="form-control" name="image" value="{{ old('image') }}"> 
  </div>
  <div class="mb-3">
    <label class="form-label" class="form-label">stock</label>
    <input type="number" class="form-control" name="stock" value="{{ old('stock') }}">
  </div>

 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection