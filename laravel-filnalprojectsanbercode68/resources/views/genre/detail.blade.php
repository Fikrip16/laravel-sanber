@extends('layouts.master')
@section('title'  )
 halaman detail genre
@endsection
@section('content',)

<h1 class = "text-primary"> {{$genre->name}}</h1>
<p> {{ $genre->description }}</p>


<hr>
<div class="row">
@forelse($genre->books as $item)
    <div class="col-4 mb-4 mb-4">
        <div class="card h-100">
            <img src="{{ asset('image/'.$item->image) }}" class="card-img-top" style="height: 300px; object-fit: cover;" alt="Cover buku">
            <div class="card-body d-flex-column">
                <h5 class="card-title">{{ $item->title }}</h5>
                <span class="badge bg-success mb-2">{{ $item->genre->name }}</span>
                <p class="mb-1"><strong>Stock:</strong>{{ $item->stock }}</p>
                <p class="card-text">{{ Str::limit($item->summary, 100) }}</p>
                <div class ="row-mt-3">
                <a href="/books/{{ $item->id }}" class="btn btn-info w-100 mb-2 mt-auto">Baca Selengkapnya</a>
                </div>
               </div>
               </div>
               </div>
   
      @empty
       <h1> tidak ada postingan di genre ini
      @endforelse
</div>
<a href="/genre" class= "btn btn-primary btn-sm my-3">kembali</a>
@endsection
