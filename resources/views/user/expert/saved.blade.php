@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
    <div class="container my-5">

        <h3 class="fw-bold mb-4 text-white fs-3">
            📅 Jadwal Latihan Tersimpan
        </h3>

        {{-- ALERT SUCCESS --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($schedules->isEmpty())
            <div class="alert alert-info">
                Belum ada jadwal yang disimpan.
            </div>
        @endif

        <div class="row g-4">
            @foreach($schedules as $schedule)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow h-100">

                    {{-- HEADER --}}
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">{{ $schedule->tujuan_latihan }}</h5>
                        <small>{{ $schedule->frekuensi }} / minggu</small>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body small">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Hari 1: {{ $schedule->hari_1 }}</li>
                            <li class="list-group-item">Hari 2: {{ $schedule->hari_2 }}</li>
                            <li class="list-group-item">Hari 3: {{ $schedule->hari_3 }}</li>
                            <li class="list-group-item">Hari 4: {{ $schedule->hari_4 }}</li>
                            <li class="list-group-item">Hari 5: {{ $schedule->hari_5 }}</li>
                            <li class="list-group-item">Hari 6: {{ $schedule->hari_6 }}</li>
                            <li class="list-group-item">Hari 7: {{ $schedule->hari_7 }}</li>
                        </ul>
                    </div>

                    {{-- FOOTER --}}
                    <div class="card-footer text-center small">

                        <div class="text-muted mb-2">
                            Disimpan: {{ $schedule->created_at->format('d M Y') }}
                        </div>

                        <form action="{{ route('expert.saved.delete', $schedule->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-outline-danger w-100">
                                🗑️ Hapus Jadwal
                            </button>
                        </form>

                    </div>

             </div>
         </div>
         @endforeach
        </div>
    </div>
</div>
@endsection
