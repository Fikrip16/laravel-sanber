@extends('layouts.master')
@section('title')
    Halaman Buku
@endsection

@section('content')

@auth
    @if(Auth()->user()->role === 'admin')
        <a href="/books/create" class="btn btn-primary my-3">Tambah</a>
    @endif
@endauth

<div class="row">
    @forelse($books as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('image/'.$item->image) }}" class="card-img-top" style="height: 300px; object-fit: cover;" alt="Cover buku">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <span class="badge bg-success mb-2">{{ $item->genre->name }}</span>
                    <p class="mb-1"><strong>Stock:</strong>{{ $item->stock }}</p>
                    <p class="card-text">{{ Str::limit($item->summary, limit: 100) }}</p>
                    <a href="/books/{{ $item->id }}" class="btn btn-info w-100 mb-2 mt-auto">Baca Selengkapnya</a>

                    @auth
                        @if(Auth()->user()->role === 'admin')
                            <a href="/books/{{ $item->id }}/edit" class="btn btn-warning w-100 mb-2">Edit</a>
                            <form action="/books/{{ $item->id }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <input type="submit" value="Delete" class="btn btn-danger w-100"
                                       onclick="return confirm('Yakin ingin hapus?')">
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    @empty
        <h1>Postingan kosong</h1>
    @endforelse
</div>

@endsection

