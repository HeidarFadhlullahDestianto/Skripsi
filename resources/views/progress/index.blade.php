@extends('layouts.app') {{-- Sesuaikan dengan nama file di folder layouts Anda --}}

@section('content')
<div class="pt-5 pt-md-0">
<style>
    .card { border: none; border-radius: 12px; }
    .chart-container { position: relative; height: 350px; width: 100%; }
    /* Memastikan navigasi menu 'active' terlihat */
    .nav-link.active { font-weight: bold; color: #0d6efd !important; }
</style>

<div class="container py-4">
    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">
        {{-- Form Input --}}
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">📝 Catat Progress Baru</div>
                <div class="card-body">
                    <form action="{{ route('progress.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Tanggal</label>
                            <input type="date" name="tanggal_catat" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label small fw-bold">Berat (kg)</label>
                                <input type="number" step="0.1" name="berat_badan" class="form-control" placeholder="65.5" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label small fw-bold">Tinggi (cm)</label>
                                <input type="number" step="0.1" name="tinggi_badan" class="form-control" placeholder="170" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Grafik --}}
        <div class="col-lg-8">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-header bg-white fw-bold">📈 Grafik Perkembangan</div>
                <div class="card-body">
                    @if($data->isEmpty())
                        <div class="text-center py-5">
                            <p class="text-muted">Belum ada data untuk ditampilkan di grafik.</p>
                        </div>
                    @else
                        <div class="chart-container">
                            <canvas id="healthChart"></canvas>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Tabel Riwayat --}}
        <div class="col-12">
            <div class="card shadow-sm border-0 mt-2">
                <div class="card-header bg-white fw-bold">📅 Riwayat Catatan</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Tanggal</th>
                                    <th>Berat (kg)</th>
                                    <th>Tinggi (cm)</th>
                                    <th>Status (IMT)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data->reverse() as $row)
                                    @php
                                        $tinggiM = $row->tinggi_badan / 100;
                                        $imt = $tinggiM > 0 ? round($row->berat_badan / ($tinggiM * $tinggiM), 1) : 0;
                                    @endphp
                                    <tr>
                                        <td class="ps-4">{{ \Carbon\Carbon::parse($row->tanggal_catat)->translatedFormat('d F Y') }}</td>
                                        <td>{{ $row->berat_badan }} kg</td>
                                        <td>{{ $row->tinggi_badan }} cm</td>
                                        <td>
                                            <span class="badge {{ $imt < 25 ? 'bg-success' : 'bg-warning' }}">
                                                {{ $imt }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">Belum ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script diletakkan di dalam section agar ikut ter-render --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    @if(!$data->isEmpty())
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('healthChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Berat Badan (kg)',
                    data: {!! json_encode($bbData) !!},
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13, 110, 253, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 5
                }, {
                    label: 'Tinggi Badan (cm)',
                    data: {!! json_encode($tbData) !!},
                    borderColor: '#198754',
                    tension: 0.4,
                    fill: false,
                    pointRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                },
                scales: {
                    y: { beginAtZero: false }
                }
            }
        });
    });
    @endif
</script>
@endsection