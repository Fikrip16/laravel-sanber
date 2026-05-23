@extends('layouts.master')
@section('title'  )
 edit books
@endsection
@section('content')
<form action="/books/{{ $books->id }}" method="POST" enctype="multipart/form-data">
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
    <label class="form-label" class="form-label">genre</label>
    <select name="genre_id" id=""  class="form-control" value="{{ old('genre') }}">
    <option value ="">--Pilih Genre--</option>
    @forelse ($genre as $item)
    @if($item->id === $books->genre_id)
    <option value = "{{ $item->id }}" selected>{{ $item->name }}</option>
    @else
    <option value = "{{ $item->id }}">{{ $item->name }}</option>

    @endif
    @empty
    <option value ="">Genre belum ada</option>
    @endforelse
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label" class="form-label">books title</label>
    <input type="text" class="form-control" name="title" value="{{ $books->title }}">
  </div>
  <div class="mb-3">
    <label for="form-label" class="form-label">books summary</label>
    <textarea class= "form-control" name="summary" id="" cols="30" rows="10">{{  $books->summary }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label" class="form-label">image</label>
    <input type="file" class="form-control" name="image"> 
  </div>
  <div class="mb-3">
    <label class="form-label" class="form-label">stock</label>
    <input type="number" class="form-control" name="stock" value="{{ old('stock') }}">
  </div>

 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection