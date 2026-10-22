<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Resensi Buku')</title>

    {{-- Bootstrap CSS Lokal --}}
    <link
        href="{{ asset('Bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet"
    >
</head>
<body>

    {{-- Navigasi Utama --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                Resensi Buku
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarResensi"
                aria-controls="navbarResensi"
                aria-expanded="false"
                aria-label="Buka navigasi"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResensi">
                <div class="navbar-nav ms-auto">
                    <a
                        class="nav-link text-white"
                        href="{{ route('home') }}"
                    >
                        Beranda
                    </a>

                    <a
                        class="nav-link text-white"
                        href="{{ route('reviews.index') }}"
                    >
                        Daftar Resensi
                    </a>
                </div>
            </div>

        </div>
    </nav>

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Bootstrap JavaScript Lokal --}}
    <script src="{{ asset('Bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>