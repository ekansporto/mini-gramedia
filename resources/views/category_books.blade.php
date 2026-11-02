@extends('layout.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <h2 class="mb-1">Kategori: {{ $category->name }}</h2>
                <p class="text-secondary mb-0">Daftar buku dengan kategori yang dipilih.</p>
            </div>
            <a href="{{ route('home') }}" class="btn btn-outline-primary">Kembali ke Beranda</a>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('category.books', $category) }}" class="row g-3 align-items-center">
                    <div class="col-md-8">
                        <label class="form-label mb-1">Cari Buku</label>
                        <input type="text" name="q" value="{{ $query }}" class="form-control"
                            placeholder="Cari judul buku atau penulis...">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label mb-1">Urutkan</label>
                        <select name="sort" class="form-select" onchange="this.form.submit()">
                            <option value="newest" {{ $sort === 'newest' ? 'selected' : '' }}>Buku terbaru</option>
                            <option value="price_asc" {{ $sort === 'price_asc' ? 'selected' : '' }}>Harga termurah</option>
                            <option value="price_desc" {{ $sort === 'price_desc' ? 'selected' : '' }}>Harga termahal
                            </option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        @if ($books->isEmpty())
            <div class="alert alert-info">Tidak ada buku yang ditemukan untuk kategori ini.</div>
        @else
            <div class="row g-4">
                @forelse($books as $book)
                    <div class="col-md-3 col-sm-6">
                        <div class="card h-100">
                            <div class="card-body">

                                {{-- Sampul Buku --}}
                                <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" class="d-block mx-auto w-75"
                                    style="height: 260px; object-fit: contain;">

                                {{-- Badge --}}
                                <div class="d-flex gap-2 mt-3">
                                    <span class="badge bg-secondary text-white">
                                        <i class="fa-solid fa-mobile-screen"></i> PDF
                                    </span>

                                    <span class="badge bg-primary text-white">3+</span>
                                </div>

                                {{-- Informasi Buku --}}
                                <div>
                                    <h3>
                                        <span class="text-secondary" style="font-size: 0.8rem">
                                            {{ $book->writer }}
                                        </span>
                                    </h3>

                                    <span style="font-size: 1rem">
                                        {{ $book->title }}
                                    </span>

                                    <h4 style="font-size: 1.2rem; font-weight: bold;">
                                        Rp {{ number_format($book->price, 0, ',', '.') }}
                                    </h4>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">Tidak ada buku yang ditemukan.</p>
                    </div>
                @endforelse
            </div>
        @endif
    </div>
@endsection
