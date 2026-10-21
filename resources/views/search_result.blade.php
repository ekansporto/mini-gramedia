@extends('layout.app')

@section('content')
    <div class="container py-4">
        <h2>Hasil Pencarian: {{ $query }}</h2>

        @if ($books->isEmpty())
            <p>Tidak ada hasil yang ditemukan</p>
        @else
            <div class="row g-4 mt-2">
                @foreach ($books as $book)
                    <div class="col-md-3 col-sm-6">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" class="card-img-top"
                                style="height: 260px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-primary text-white align-self-start mb-2"><i
                                        class="fa-solid fa-mobile-screen"></i>
                                    PDF</span>
                                <div class="text-secondary small mb-1">{{ $book->writer }}</div>
                                <h3 class="h5 mb-2">{{ $book->title }}</h3>
                                <div class="mt-auto fw-bold text-primary">
                                    Rp {{ number_format($book->price, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
