<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Superfit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-wrapper {
            width: 100%;
            padding: 15px;
        }

        .register-card {
            max-width: 420px;
            margin: auto;
            border-radius: 18px;
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
        }

        .btn-register {
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,.25);
        }

        @media (max-width: 576px) {
            .register-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="register-wrapper">
    <div class="card shadow-lg register-card p-4">
        <h3 class="text-center fw-bold text-primary mb-1">Buat Akun</h3>
        <p class="text-center text-muted mb-4">Mulai perjalanan fitness kamu 💪</p>

        @if ($errors->any())
            <div class="alert alert-danger small">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <input type="text" name="name" class="form-control"
                       placeholder="Nama Lengkap" required>
            </div>

            <div class="mb-3">
                <input type="email" name="email" class="form-control"
                       placeholder="Email Gmail" required>
                <small class="text-muted">Gunakan email Gmail aktif</small>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control"
                       placeholder="Password" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control"
                       placeholder="Konfirmasi Password" required>
            </div>

            <div class="mb-3">
                <input type="text" name="no_hp" class="form-control"
                       placeholder="No WhatsApp" required>
            </div>

            <div class="mb-3">
                <label class="form-label small">Foto Profil</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-register">
                Daftar
            </button>
        </form>

        <div class="text-center mt-3">
            <small>Sudah punya akun?
                <a href="{{ route('home') }}" class="text-decoration-none fw-semibold">
                    Login
                </a>
            </small>
        </div>
    </div>
</div>

</body>
</html>
