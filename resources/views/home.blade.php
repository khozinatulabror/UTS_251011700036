@extends('layouts.app')

@section('title', 'Beranda | Resensi Buku')

@section('content')
<div class="container py-5">

    <section class="rounded-4 p-4 p-md-5 mb-5 text-white"
        style="background: linear-gradient(135deg, #102a43, #2563a6);">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <span class="badge bg-light text-primary mb-3">
                    SELAMAT DATANG
                </span>

                <h1 class="display-5 fw-bold">
                    Temukan Cerita, Temukan Inspirasi
                </h1>

                <p class="lead mt-3">
                    Jelajahi berbagai buku, kenali isinya, dan baca pengalaman
                    pembaca melalui kumpulan resensi buku pilihan.
                </p>

                <a href="{{ route('reviews.index') }}"
                    class="btn btn-light btn-lg text-primary fw-semibold mt-2">
                    Jelajahi Semua Resensi
                </a>
            </div>

            <div class="col-lg-4 text-center">
                <div class="rounded-4 p-4"
                    style="background: rgba(255,255,255,.12);">
                    <div style="font-size: 76px;">📚</div>
                    <h2 class="h4 fw-bold mt-2">Ruang Baca</h2>
                    <p class="mb-0">
                        Temukan buku yang menarik untuk dibaca.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div>
                <span class="text-primary fw-semibold small">REKOMENDASI</span>
                <h2 class="fw-bold mt-1">Buku Pilihan</h2>
                <p class="text-secondary mb-0">
                    Beberapa buku dari koleksi resensi kami.
                </p>
            </div>

            <a href="{{ route('reviews.index') }}"
                class="btn btn-outline-primary">
                Lihat Semua Buku
            </a>
        </div>

        <div class="row g-4">
            @forelse ($reviews as $review)
                <div class="col-sm-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        @if ($review->book)
                            <img
                                src="{{ asset('assets/images/' . $review->book->image) }}"
                                alt="Sampul {{ $review->book->title }}"
                                class="card-img-top"
                                style="height: 250px; object-fit: contain; background: #f1f5f9; padding: 16px;"
                            >

                            <div class="card-body p-4">
                                <h3 class="h5 fw-bold">
                                    {{ $review->book->title }}
                                </h3>

                                <p class="text-secondary small mb-2">
                                    {{ $review->book->author }}
                                </p>

                                <p class="text-secondary">
                                    {{ \Illuminate\Support\Str::limit($review->book->description, 100) }}
                                </p>

                                <div class="text-warning mb-3">
                                    @for ($i = 1; $i <= 5; $i++)
                                        {{ $i <= $review->rating ? '★' : '☆' }}
                                    @endfor
                                    <span class="text-secondary small">
                                        {{ $review->rating }}/5
                                    </span>
                                </div>

                                <a href="{{ route('reviews.show', $review->id) }}"
                                    class="btn btn-primary w-100">
                                    Baca Resensi
                                </a>
                            </div>
                        @else
                            <div class="card-body p-4">
                                <p class="text-secondary mb-0">
                                    Informasi buku belum tersedia.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        Belum ada buku yang dapat ditampilkan.
                    </div>
                </div>
            @endforelse
        </div>
    </section>

</div>
@endsection
