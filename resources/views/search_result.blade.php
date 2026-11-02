@extends('layout.app')

@section('content')
    <div class="container py-4">
        <h2>Hasil Pencarian: {{ $query }}</h2>

        @if ($books->isEmpty())
            <p>Tidak ada hasil yang ditemukan</p>
        @else
            <div class="row g-4 mt-2">
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
                        <p class="text-center">Belum ada buku yang ditemukan dikategori ini.</p>
                    </div>
                @endforelse
            </div>
        @endif
    </div>
@endsection
