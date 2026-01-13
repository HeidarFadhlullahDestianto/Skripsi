@extends('layouts.aku')

@section('maincontent')
<section class="py-5 bg-light min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                                <i class="bi bi-chat-dots fs-1"></i>
                            </div>
                            <h4 class="fw-bold">Verifikasi Kode</h4>
                            <p class="text-muted small">Silahkan masukkan kode verifikasi yang telah dikirimkan.</p>
                        </div>

                        @if(session('otp'))
                            <div class="alert alert-warning border-0 shadow-sm mb-4 text-center py-2">
                                <small class="d-block text-uppercase fw-bold opacity-75">Simulasi OTP</small>
                                <span class="fs-4 fw-bold letter-spacing-2">{{ session('otp') }}</span>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.verify.submit') }}">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" name="code" class="form-control rounded-3 text-center fs-4 fw-bold @error('code') is-invalid @enderror" id="otpCode" placeholder="123456" maxlength="6">
                                <label for="otpCode">Kode Verifikasi</label>
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-primary w-100 py-2 fw-bold rounded-pill shadow-sm">
                                Verifikasi Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection