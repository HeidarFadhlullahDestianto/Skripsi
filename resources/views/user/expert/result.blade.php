@extends('layouts.app')

@section('content')
<div class="container page-wrapper">

    <h4 class="mb-4 fw-bold text-center">
        📋 Rekomendasi Jadwal Latihan
    </h4>

    <div class="row g-4">

        @forelse($rules as $rule)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card h-100 shadow-sm border-0">

                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0 fw-bold">
                            {{ $rule->tujuan_latihan }}
                        </h5>
                    </div>

                    <div class="card-body text-center">
                        <span class="badge bg-success mb-3">
                            Frekuensi: {{ $rule->frekuensi }} / minggu
                        </span>

                        <div class="d-grid gap-2 mt-3">
                            <a href="{{ route('expert.detail', $rule->id) }}"
                               class="btn btn-outline-primary btn-sm">
                                📄 Lihat Detail
                            </a>

                            <form method="POST" action="{{ route('expert.save', $rule->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm w-100">
                                    💾 Simpan Jadwal
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-footer text-muted text-center small">
                        Sistem Pakar Latihan
                    </div>

                </div>
            </div>

        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    ❌ <strong>Tidak ada rekomendasi jadwal latihan</strong><br>
                    Silakan ubah kriteria.
                </div>
            </div>
        @endforelse

    </div>

</div>
@endsection
