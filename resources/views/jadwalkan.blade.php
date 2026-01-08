@extends('layouts.app')

@section('content')
<style>
    .konsultasi-container {
        max-width: 900px;
        margin: 40px auto;
        background: #e5e5e5;
        padding: 30px 40px;
        border-radius: 8px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px 50px;
    }

    .form-group label {
        font-weight: 600;
        font-size: 14px;
        display: block;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background: white;
    }

    .btn-submit {
        background: red;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        float: right;
        cursor: pointer;
    }

    .btn-submit:hover {
        background: darkred;
    }
</style>

<div class="konsultasi-container">
    <h2 style="margin-bottom: 20px;">Konsultasi</h2>
    <form method="POST" action="#">
        @csrf
        <div class="form-grid">

            <div class="form-group">
                <label>Umur</label>
                <input type="number">
            </div>

            <div class="form-group">
                <label>Tingkat</label>
                <input type="text">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tujuan</label>
                <input type="text">
            </div>

            <div class="form-group">
                <label>Tinggi Badan</label>
                <input type="number">
            </div>

            <div class="form-group">
                <label>Frekuensi Latihan</label>
                <select>
                    <option>2x Seminggu</option>
                    <option>3x Seminggu</option>
                </select>
            </div>

        </div>

        <button class="btn-submit">Jadwalkan</button>
    </form>
</div>
@endsection
