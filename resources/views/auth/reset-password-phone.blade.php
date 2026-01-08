@extends('layouts.aku')

@section('maincontent')
<div class="container mt-5" style="max-width: 450px">
    <h4 class="text-center mb-3">Ganti Password</h4>

    <form method="POST" action="{{ route('password.reset.phone.submit') }}">
        @csrf

        <div class="mb-3">
            <label>Password Baru</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button class="btn btn-success w-100">Simpan Password</button>
    </form>
</div>
@endsection
