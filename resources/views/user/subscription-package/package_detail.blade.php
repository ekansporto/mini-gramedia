@extends('layout.app')

@section('content')
    <div class="container py-4">

        <div class="card shadow-sm mb-4"
            style="background: linear-gradient(135deg, #ffffff 0%, {{ $package->color ?? '#d9f99d' }} 100%);">
            <div class="card-body p-4">
                <h2 class="fw-bold">{{ $package->name }}</h2>

                <p>{{ $package->description }}</p>

                <h3 class="text-warning fw-bold">
                    Rp {{ number_format($package->price, 0, ',', '.') }}
                </h3>

                <span class="text-secondary">
                    {{ $books->total() }} buku dalam paket ini
                </span>
            </div>
        </div>

        {{-- Judul dan pencarian --}}
        <div class="d-flex justify-content-between align-items-start
            flex-wrap gap-3 mb-3">
            <h3 class="fw-bold mb-0">Daftar Buku</h3>

            <div class="d-flex flex-column align-items-end gap-2">
                <a href="{{ route('subscription-packages.checkout', $package->id) }}" class="btn btn-success">
                    Langganan Sekarang
                </a>

                <form action="{{ route('package.detail', $package->id) }}" method="GET" class="d-flex gap-2">
                    <input type="search" name="q" value="{{ $query }}" class="form-control"
                        placeholder="Cari judul buku..." aria-label="Cari judul buku">

                    <button type="submit" class="btn btn-primary">
                        Cari
                    </button>
                </form>
            </div>
        </div>

        {{-- Daftar buku --}}
        <div class="row g-3">
            @forelse ($books as $book)
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
                    <div class="alert alert-info">
                        @if ($query !== '')
                            Buku dengan judul "{{ $query }}" tidak ditemukan
                            dalam paket ini.
                        @else
                            Belum ada buku yang terhubung dengan paket ini.
                        @endif
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $books->links() }}
        </div>

    </div>
@endsection
