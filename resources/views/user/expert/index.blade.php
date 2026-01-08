@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">🔍 Sistem Pakar Rekomendasi Latihan</h5>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('expert.recommend') }}">
                            @csrf

                            <div class="row g-3">

                                {{-- USIA --}}
                                <div class="col-md-3">
                                    <label class="form-label">Usia</label>
                                    <input type="number" name="usia" class="form-control" placeholder="Contoh: 25" required>
                                </div>

                                {{-- JENIS KELAMIN --}}
                                <div class="col-md-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                {{-- TINGKAT KESULITAN --}}
                                <div class="col-md-3">
                                    <label class="form-label">Tingkat Kesulitan</label>
                                    <select name="tingkat_kesulitan" class="form-select" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Pemula">Pemula</option>
                                        <option value="Menengah">Menengah</option>
                                        <option value="Pro">Pro</option>
                                    </select>
                                </div>

                                {{-- TUJUAN LATIHAN --}}
                                <div class="col-md-3">
                                    <label class="form-label">Tujuan Latihan</label>
                                    <select name="tujuan_latihan" class="form-select" required>
        <option value="">-- Pilih --</option>
        <option value="Menurunkan Berat Badan">Menurunkan Berat Badan</option>
        <option value="Pembentukan Otot">Pembentukan Otot</option>
        <option value="Meningkatkan Massa Otot">Meningkatkan Massa Otot</option>
        <option value="Meningkatkan Kekuatan">Meningkatkan Kekuatan</option>
    </select>
                                </div>

                                {{-- FREKUENSI --}}
                                <div class="col-md-3">
                                    <label class="form-label">Frekuensi / Minggu</label>
                                    <select name="frekuensi" class="form-select" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="2x">2x</option>
                                        <option value="3x">3x</option>
                                        <option value="4x">4x</option>
                                    </select>
                                </div>

                                {{-- BUTTON --}}
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary w-100">
                                        🔍 Jadwalkan
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
