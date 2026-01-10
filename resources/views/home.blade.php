@extends('layouts.aku')

@section('maincontent')

{{-- PESAN SUKSES REGISTER --}}
@if(session('success'))
<div class="container mt-3">
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
</div>
@endif

<section class="hero-section">
    <div class="hero-overlay"></div>

    <div class="container hero-content">
        <div class="hero-card">
            <h1>Penjadwalan Latihan Fitness</h1>
            <p>Silahkan login terlebih dahulu untuk mengatur jadwal latihanmu</p>

          
        </div>
    </div>
</section>
@endsection
