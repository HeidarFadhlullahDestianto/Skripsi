@extends('layouts.aku')

@section('maincontent')
<div class="container mt-5" style="max-width: 450px">
    <h4 class="text-center mb-3">Verifikasi Kode</h4>

    @if(session('otp'))
        <div class="alert alert-warning">
            <b>SIMULASI OTP:</b> {{ session('otp') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.verify.submit') }}">
        @csrf

        <div class="mb-3">
            <label>Kode Verifikasi</label>
            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror">
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary w-100">Verifikasi</button>
    </form>
</div>
@endsection
