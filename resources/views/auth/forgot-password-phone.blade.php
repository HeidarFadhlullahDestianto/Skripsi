@extends('layouts.aku')

@section('maincontent')
<div class="container mt-5" style="max-width: 450px">
    <h4 class="mb-3 text-center text-dark fw-bold">Lupa Password</h4>

    <form method="POST" action="{{ route('password.phone.send') }}">
        @csrf

        <div class="mb-3 text-dark fw-bold">
            <label>No HP Terdaftar</label>
            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror">
            @error('no_hp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary w-100">Kirim Kode</button>
    </form>
    <a href="{{ url()->previous() }}" class="mt-3 btn btn-secondary">
    ← Kembali
</a>
</div>
@endsection
