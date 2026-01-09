<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SuperFit - @yield('title', 'Home')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/styleku.css') }}" />

    @yield('styles')
</head>
<body>

<!-- ================= HEADER ================= -->
@include('components.headerku')

<!-- ================= MAIN ================= -->
<main class="main-wrapper">
    @yield('maincontent')
</main>

<!-- ================= FOOTER ================= -->
@include('components.footer')

<!-- ================= LOGIN MODAL ================= -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow">

            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror"
                               required autofocus>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               required>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center mb-3">
                        <a href="{{ route('password.phone') }}" class="small text-decoration-none">
                            Lupa password?
                        </a>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                        Masuk
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- ================= JS ================= -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Auto show modal jika error -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if($errors->has('email') || $errors->has('password'))
            new bootstrap.Modal(document.getElementById('loginModal')).show();
        @endif
    });
</script>

@yield('scripts')
</body>
</html>
