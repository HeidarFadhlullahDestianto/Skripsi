<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SuperFit - @yield('title', 'Home')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .hero-bg {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            min-height: 90vh;
        }
        .transition-up:hover {
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container justify-content-center justify-content-md-start">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
            <img src="{{ asset('images/spft.png') }}" alt="Logo" width="40" height="40" class="rounded-circle">
            <span class="fs-4">SuperFit</span>
        </a>
    </div>
</nav>

<main>
    @yield('maincontent')
</main>

<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container text-center text-md-start">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase fw-bold text-primary mb-4">SuperFit</h5>
                <p class="text-secondary">Solusi digital terbaik untuk memanajemen jadwal latihan fitness Anda dengan cara yang modern dan sistematis.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase fw-bold text-primary mb-4">Kontak Kami</h5>
                <p class="text-secondary mb-1"><i class="bi bi-geo-alt me-2"></i> Jl. A. Yani No.252, Janidan, Ngadirejo, Kec. Kartasura, Kabupaten Sukoharjo, Jawa Tengah 57163</p>
                <p class="text-secondary mb-1"><i class="bi bi-envelope me-2"></i> ig @superfit.kartasura</p>
            </div>
            <div class="col-md-4 mb-4 text-center">
                <h5 class="text-uppercase fw-bold text-primary mb-4">Media Sosial</h5>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#" class="text-white fs-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white fs-3"><i class="bi bi-tiktok"></i></a>
                </div>
            </div>
        </div>
        <hr class="border-secondary">
        <div class="text-center pt-2">
            <p class="small text-secondary mb-0">&copy; 2026 <strong>SuperFit Indonesia</strong>. All rights reserved.</p>
        </div>
    </div>
</footer>

<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">
                <h2 class="fw-bold mb-4 text-center">Selamat Datang</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control rounded-3 @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Alamat Email</label>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control rounded-3 @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <button class="w-100 btn btn-lg rounded-3 btn-primary fw-bold shadow-sm" type="submit">Masuk</button>
                    <div class="text-center mt-3">
                        <a href="{{ route('password.phone') }}" class="text-decoration-none small text-muted">Lupa Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if($errors->has('email') || $errors->has('password'))
            new bootstrap.Modal(document.getElementById('loginModal')).show();
        @endif
    });
</script>
</body>
</html>