<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Latihan')</title>
    <title>{{ $title ?? 'Sistem Fitness' }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tambahan CSS khusus halaman -->
    @yield('styles')

    <style>
        /* Responsif tambahan untuk mobile */
        @media (max-width: 576px) {
            .list-group-item span {
                font-size: 0.9rem;
            }
            .btn-outline-dark {
                padding: 0.25rem 0.5rem;
                font-size: 0.8rem;
            }
        }
    </style>
 
</head>
<body>
    {{-- Header --}}
    @include('components.header')

    {{-- Konten utama --}}
    <main class="py-3">
        @yield('maincontent')
    </main>

    <!-- Bootstrap JS bundle (Popper included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tambahan JS khusus halaman -->
    @yield('scripts')
</body>
</html>
