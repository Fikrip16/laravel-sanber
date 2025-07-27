@extends('layouts.master')
@section('title'  )
 Detail Buku
@endsection
@section('content')
<img src="{{ asset('image/'. $books->image)}}" width="100%" height="800px"  alt ="">
<h1 class="text-primary">{{ $books->title }}</h1>
<p> {{ $books->summary }}</p>
<hr>
<h1>List Comments</h1>
  @forelse ($books->comments as $item)
  <div class="card my-3">
  <div class="card-header">
    {{ $item->owner->name }}
  </div>
  <div class="card-body">  
    <p class="card-text">{{ $item->content }}</p>
  </div>
</div>
@empty
<h3> Tidak Ada Komentar </h3>
@endforelse

<hr>
<h3>comments</h3>
@auth
<form action="/comments/{{$books->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif
  <div class = "mb-3">
    <textarea name="content" class="form-control" placeholder = "isi komentar..." id="" cols="3"></textarea> 
  </div>
 
  <button type="submit" class="btn btn-primary">comment</button>
</form>
@endauth
@endsection

