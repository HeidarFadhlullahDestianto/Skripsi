@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<div class="container page-wrapper mt-4">

    <h4 class="mb-5 fw-bold text-center">
        💾 Jadwal Latihan Tersimpan
    </h4>

    @forelse($schedules as $schedule)

        {{-- HEADER JADWAL (TANPA CARD) --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
            <div class="fw-bold">
                📅 Disimpan pada:
                <span class="text-muted">
                    {{ $schedule->created_at->format('d M Y') }}
                </span>
            </div>

            {{-- BUTTON HAPUS --}}
            <form action="{{ route('expert.saved.delete', $schedule->id) }}" method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger mt-2 mt-md-0">
                    🗑 Hapus Jadwal
                </button>
            </form>
        </div>

        {{-- LIST HARI (CARD PER HARI) --}}
        @for($i = 1; $i <= 7; $i++)
            @if($schedule->{'hari_'.$i})

            <div class="card mb-3 shadow-sm">
                <div class="card-body">

                    <div class="text-muted small mb-1">
                        Hari ke-{{ $i }}
                    </div>

                    <div class="fw-bold text-primary">
                        {{ $schedule->{'hari_'.$i} }}
                    </div>

                    <div class="text-muted mt-1">
                        @if(!empty($schedule->{'latihan_'.$i}))
                            {{ $schedule->{'latihan_'.$i} }}
                        @else
                            <em>Tidak ada latihan</em>
                        @endif
                    </div>

                </div>
            </div>

            @endif
        @endfor

        {{-- PEMBATAS ANTAR JADWAL --}}
        <hr class="my-5">

    @empty
        <div class="alert alert-warning text-center">
            Belum ada jadwal tersimpan.
        </div>
    @endforelse

</div>
@endsection
