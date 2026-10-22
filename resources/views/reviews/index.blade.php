@extends('layouts.app')

@section('title', 'Daftar Resensi Buku')

@section('content')
<div class="container py-5">

    {{-- Header halaman --}}
    <div class="p-4 p-md-5 mb-5 rounded-4 text-white"
         style="background: linear-gradient(135deg, #102a43, #2563a6);">
        <span class="badge bg-light text-primary mb-3">
            KOLEKSI RESENSI
        </span>

        <h1 class="display-5 fw-bold">
            Temukan Buku Favoritmu
        </h1>

        <p class="lead mb-0">
            Jelajahi koleksi buku dan baca pengalaman pembaca lainnya.
        </p>
    </div>

    {{-- Judul dan jumlah resensi --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h2 class="h3 fw-bold mb-1">Daftar Resensi</h2>
            <p class="text-secondary mb-0">
                Koleksi buku pilihan beserta ulasan pembacanya.
            </p>
        </div>

        <span class="badge text-bg-primary rounded-pill px-3 py-2">
            {{ $reviews->total() }} Resensi
        </span>
    </div>

    {{-- Daftar kartu buku --}}
    <div class="row g-4">
        @forelse ($reviews as $review)
            <div class="col-sm-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                    {{-- Sampul buku --}}
                    @if ($review->book)
                        <img
                            src="{{ asset('assets/images/' . $review->book->image) }}"
                            class="card-img-top"
                            alt="Sampul {{ $review->book->title }}"
                            loading="lazy"
                            style="height: 280px; object-fit: contain; background: #f1f5f9; padding: 18px;"
                        >
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light"
                             style="height: 280px;">
                            <span class="text-secondary">
                                Informasi buku tidak tersedia
                            </span>
                        </div>
                    @endif

                    {{-- Informasi buku dan resensi --}}
                    <div class="card-body p-4 d-flex flex-column">

                        @if ($review->book)
                            <h3 class="h5 fw-bold mb-1">
                                {{ $review->book->title }}
                            </h3>

                            <p class="small text-secondary mb-3">
                                {{ $review->book->author }}
                            </p>

                            <p class="fw-semibold text-primary mb-2">
                                Rp{{ number_format($review->book->price, 0, ',', '.') }}
                            </p>

                            <p class="text-secondary small">
                                {{ \Illuminate\Support\Str::limit($review->book->description, 115) }}
                            </p>
                        @else
                            <h3 class="h5 fw-bold mb-3">
                                Resensi Buku #{{ $review->book_id }}
                            </h3>
                        @endif

                        {{-- Rating --}}
                        <div class="mb-3"
                             aria-label="Rating {{ $review->rating }} dari 5">
                            <span class="text-warning">
                                @for ($i = 1; $i <= 5; $i++)
                                    {{ $i <= $review->rating ? '★' : '☆' }}
                                @endfor
                            </span>

                            <span class="small text-secondary ms-1">
                                {{ $review->rating }}/5
                            </span>
                        </div>

                        {{-- Ringkasan ulasan --}}
                        <p class="small text-secondary mb-3">
                            “{{ \Illuminate\Support\Str::limit($review->review_text, 100) }}”
                        </p>

                        {{-- Reviewer dan tombol detail --}}
                        <div class="mt-auto pt-3 border-top">
                            <p class="small mb-3">
                                Diulas oleh
                                <strong>{{ $review->reviewer }}</strong>
                            </p>

                            <a
                                href="{{ route('reviews.show', $review->id) }}"
                                class="btn btn-primary w-100 rounded-3"
                            >
                                Lihat Detail
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info rounded-3">
                    Belum ada resensi buku yang tersedia.
                </div>
            </div>
        @endforelse
    </div>

    {{-- Navigasi pagination --}}
    @if ($reviews->hasPages())
        <div class="mt-5">
            <div class="d-flex justify-content-center">
                {{ $reviews->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>

            <p class="text-center text-secondary small mt-3">
                Menampilkan {{ $reviews->firstItem() }}–{{ $reviews->lastItem() }}
                dari {{ $reviews->total() }} resensi buku
            </p>
        </div>
    @endif

</div>
@endsection