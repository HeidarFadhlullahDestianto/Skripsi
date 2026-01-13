@extends('layouts.aku')

@section('maincontent')
<section class="py-5 bg-light min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                                <i class="bi bi-shield-lock fs-1"></i>
                            </div>
                            <h4 class="fw-bold">Lupa Password</h4>
                            <p class="text-muted small">Masukkan nomor HP yang terdaftar untuk menerima kode verifikasi.</p>
                        </div>

                        <form method="POST" action="{{ route('password.phone.send') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="no_hp" class="form-control rounded-3 @error('no_hp') is-invalid @enderror" id="noHpInput" placeholder="08123456789">
                                <label for="noHpInput">No HP Terdaftar</label>
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-primary w-100 py-2 fw-bold rounded-pill shadow-sm mb-3">
                                Kirim Kode Verifikasi
                            </button>
                        </form>

                        <div class="text-center">
                            <a href="{{ url()->previous() }}" class="text-decoration-none small text-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Kembali ke Halaman Sebelumnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection