@extends('layouts.aku')

@section('maincontent')
<section class="py-5 bg-light min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                                <i class="bi bi-key fs-1"></i>
                            </div>
                            <h4 class="fw-bold">Ganti Password</h4>
                            <p class="text-muted small">Buat password baru yang kuat untuk mengamankan akun Anda.</p>
                        </div>

                        <form method="POST" action="{{ route('password.reset.phone.submit') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control rounded-3" id="passInput" placeholder="Password Baru">
                                <label for="passInput">Password Baru</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" name="password_confirmation" class="form-control rounded-3" id="confirmInput" placeholder="Konfirmasi Password">
                                <label for="confirmInput">Konfirmasi Password</label>
                            </div>

                            <button class="btn btn-success w-100 py-2 fw-bold rounded-pill shadow-sm">
                                <i class="bi bi-check-circle me-1"></i> Simpan Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection