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
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" class="d-block mx-auto mb-3"
                                style="width: 100%; height: 200px; object-fit: contain;">

                            <h5 class="fw-bold">{{ $book->title }}</h5>

                            <p class="text-secondary mb-2">
                                {{ $book->writer }}
                            </p>

                            <p class="small mb-2">
                                {{ $book->bookCategory->name ?? 'Tanpa kategori' }}
                            </p>

                            <p class="fw-bold mb-0">
                                Rp {{ number_format($book->price, 0, ',', '.') }}
                            </p>
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
