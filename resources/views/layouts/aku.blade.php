<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Superfit - @yield('title', 'Solo')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
  
    <link rel="stylesheet" href="{{ asset('css/styleku.css') }}" />

    <!-- Section untuk tambahan CSS dari halaman lain -->
    @yield('styles')
</head>
<body>

    <!-- Header -->
    @include('components.headerku')

    <!-- Konten Utama -->
    <main>
        @yield('maincontent')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h5 class="modal-title text-dark fw-bold" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               placeholder="Masukkan email"
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"
                               name="password"
                               id="password"
                               required
                               placeholder="Masukkan password"
                               class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center mt-3">
    <a href="{{ route('password.phone') }}" class="text-decoration-none">
        Lupa password?
    </a>
</div>

</div>

                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script auto buka modal kalau error -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if($errors->has('email') || $errors->has('password'))
            var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        @endif
    });
</script>

    <!-- Section tambahan JS -->
    @yield('scripts')
</body>
</html>
