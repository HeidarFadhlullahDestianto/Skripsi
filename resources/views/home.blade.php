@extends('layouts.aku')

@section('maincontent')

<section class="hero-bg d-flex align-items-center text-white text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 py-5">
                <h1 class="display-3 fw-bold mb-3">Penjadwalan Latihan Fitness</h1>
                <p class="lead mb-5 opacity-75">Optimalkan progres latihanmu dengan penjadwalan yang cerdas dan terpantau. Mulailah perjalanan sehatmu hari ini.</p>
                
                {{-- KONDISI JIKA BELUM LOGIN --}}
                @guest
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                    <button class="btn btn-primary btn-lg px-5 rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Mulai Sekarang
                    </button>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-5 rounded-pill">
                        <i class="bi bi-person-plus me-2"></i>Daftar Member
                    </a>
                </div>
                @endguest

                {{-- KONDISI JIKA SUDAH LOGIN --}}
                @auth
                <div class="d-flex flex-column align-items-center gap-3">
                    <p class="fs-4 fw-bold">Selamat Datang kembali, {{ Auth::user()->name }}!</p>
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg px-5 rounded-pill shadow">
                            <i class="bi bi-power me-2"></i>Logout Akun
                        </button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Fitur Utama</h2>
            <p class="text-muted">Semua yang Anda butuhkan untuk manajemen latihan dalam satu dashboard.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 transition-up">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="bi bi-calendar-check fs-1"></i>
                    </div>
                    <h5 class="fw-bold">Atur Jadwal</h5>
                    <p class="text-muted small">Susun jadwal latihan harian atau mingguan sesuai dengan target personal Anda.</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 transition-up">
                    <div class="bg-success bg-opacity-10 text-success rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="bi bi-graph-up-arrow fs-1"></i>
                    </div>
                    <h5 class="fw-bold">Lihat Latihan</h5>
                    <p class="text-muted small">lihat latihan jika anda merasa bingung.</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4 transition-up">
                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="bi bi-person-gear fs-1"></i>
                    </div>
                    <h5 class="fw-bold">Panduan Ahli</h5>
                    <p class="text-muted small">Dapatkan rekomendasi program latihan dari instruktur berpengalaman.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-4">Lokasi Pusat Kami</h2>
                <p class="text-muted mb-4">Kunjungi gym kami untuk mendapatkan fasilitas lengkap dan suasana latihan yang mendukung.</p>
                
                <div class="card border-0 shadow-sm p-3 rounded-4 mb-3 bg-light">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill text-primary fs-3 me-3"></i>
                        <span class="small">Jl. A. Yani No.252, Janidan, Ngadirejo, Kec. Kartasura, Kabupaten Sukoharjo, Jawa Tengah 57163</span>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-3 rounded-4 bg-light">
                    <div class="d-flex align-items-start">
                        <i class="bi bi-clock-fill text-primary fs-3 me-3"></i>
                        <div>
                            <span class="d-block fw-bold small">Jam Operasional:</span>
                            <span class="small d-block">Senin - Sabtu: 06:00 - 22:00</span>
                            <span class="small d-block text-danger">Minggu: Tutup</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="rounded-4 overflow-hidden shadow-lg border border-5 border-white" style="height: 400px;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.123456789!2d110.7412345!3d-7.5581234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1443657925e5%3A0x6850bdff949dcdaf!2sSuperfit!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection