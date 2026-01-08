@extends('layouts.app')

@section('content')
<style>
    .page-bg {
        min-height: 100vh;
        background: linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)),
            url('/images/gym-bg.jpg') center/cover no-repeat;
        padding: 40px 20px;
    }

    .content-box {
        background: rgba(255,255,255,.9);
        max-width: 900px;
        margin: auto;
        padding: 30px;
        border-radius: 16px;
    }

    .exercise-item {
        background: #f9fafb;
        border-radius: 10px;
        padding: 14px 18px;
        margin-bottom: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .exercise-item span {
        font-weight: 600;
    }
</style>
<div class="pt-5 pt-md-0">
    <div class="page-bg">
        <div class="content-box">

            <h1 class="text-3xl font-bold mb-4">
                {{ $day }} - Jenis Latihan
            </h1>

            @forelse ($schedules as $schedule)
                @foreach ($schedule->details as $detail)
                    <div class="exercise-item">
                        <span>{{ $detail->latihan->name }}</span>
                        <span>{{ $detail->sets }} Set × {{ $detail->reps }} Reps</span>
                    </div>
                @endforeach
            @empty
                <p>Tidak ada latihan pada hari ini.</p>
            @endforelse

            <a href="{{ route('user.jadwal.index') }}"
            class="inline-block mt-6 text-blue-600 font-semibold">
                ← Kembali ke Jadwal
            </a>
        </div>
    </div>
</div>
@endsection
