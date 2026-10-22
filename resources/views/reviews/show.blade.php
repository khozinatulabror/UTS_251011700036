@extends('layouts.app')

@section('title', 'Detail Resensi Buku')

@section('content')
<div class="container py-5">

    {{-- Tombol kembali --}}
    <div class="mb-4">
        <a href="{{ route('reviews.index') }}"
           class="btn btn-outline-secondary rounded-pill px-4">
            &larr; Kembali ke Daftar Resensi
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="row g-0">

            {{-- Sampul buku --}}
            <div class="col-md-4 bg-light d-flex align-items-center justify-content-center p-4">
                @if ($review->book && $review->book->image)
                    <img
                        src="{{ asset('assets/images/' . $review->book->image) }}"
                        alt="Sampul {{ $review->book->title }}"
                        class="img-fluid rounded-3"
                        style="max-height: 440px; width: 100%; object-fit: contain;"
                    >
                @else
                    <div class="text-secondary text-center py-5">
                        Sampul buku belum tersedia.
                    </div>
                @endif
            </div>

            {{-- Informasi buku dan resensi --}}
            <div class="col-md-8">
                <div class="card-body p-4 p-lg-5">

                    <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-3">
                        DETAIL RESENSI
                    </span>

                    @if ($review->book)
                        <h1 class="fw-bold mb-2">
                            {{ $review->book->title }}
                        </h1>

                        <p class="text-secondary mb-3">
                            Oleh {{ $review->book->author }}
                        </p>

                        <h2 class="h5 fw-bold text-primary mb-4">
                            Rp{{ number_format($review->book->price, 0, ',', '.') }}
                        </h2>

                        {{-- Deskripsi lengkap buku --}}
                        <div class="mb-4">
                            <h2 class="h5 fw-bold mb-2">Tentang Buku</h2>

                            <p class="text-secondary"
                               style="line-height: 1.9; white-space: pre-line;">{{ $review->book->description }}</p>
                        </div>
                    @else
                        <h1 class="fw-bold mb-3">
                            Resensi Buku #{{ $review->book_id }}
                        </h1>

                        <div class="alert alert-warning">
                            Informasi buku belum tersedia.
                        </div>
                    @endif

                    <hr class="my-4">

                    {{-- Rating --}}
                    <div class="mb-4">
                        <h2 class="h5 fw-bold mb-2">Rating Pembaca</h2>

                        <span class="text-warning fs-4">
                            @for ($i = 1; $i <= 5; $i++)
                                {{ $i <= $review->rating ? '★' : '☆' }}
                            @endfor
                        </span>

                        <span class="text-secondary ms-2">
                            {{ $review->rating }}/5
                        </span>
                    </div>

                    {{-- Informasi reviewer --}}
                    <div class="mb-4">
                        <p class="text-secondary small mb-1">
                            Nama Reviewer
                        </p>

                        <h3 class="h6 fw-semibold">
                            {{ $review->reviewer }}
                        </h3>
                    </div>

                    {{-- Isi resensi lengkap --}}
                    <div class="mb-4">
                        <h2 class="h5 fw-bold mb-2">Ulasan Pembaca</h2>

                        <p class="text-secondary"
                           style="line-height: 1.9; white-space: pre-line;">{{ $review->review_text }}</p>
                    </div>

                    {{-- Tanggal resensi --}}
                    <div class="border-top pt-3">
                        <p class="text-secondary small mb-0">
                            Tanggal Resensi:
                            <strong>
                                {{ \Illuminate\Support\Carbon::parse($review->created_at)->format('d F Y') }}
                            </strong>
                        </p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('reviews.index') }}"
                           class="btn btn-primary rounded-pill px-4">
                            &larr; Kembali ke Daftar
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
