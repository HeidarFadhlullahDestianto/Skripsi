@extends('layouts.app')

@section('content')
<style>
    .page-bg {
        min-height: 100vh;
        background: linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)),
            url('/images/gym-bg.jpg') center/cover no-repeat;
        padding: 40px 20px;
    }

    .day-card {
        background: rgba(0,0,0,.55);
        color: #fff;
        border-radius: 14px;
        padding: 20px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .btn {
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
        cursor: pointer;
    }

    .btn-warning {
        background: #f59e0b;
        color: #000;
    }

    .btn-danger {
        background: #dc2626;
        color: #fff;
    }

    .link-card {
        text-decoration: none;
        color: inherit;
        flex: 1;
    }
</style>
<div class="pt-5 pt-md-0">
    <div class="page-bg">
        <h1 class="text-3xl font-bold text-white mb-8">
            Jadwal Latihan
        </h1>

        @foreach ($schedules as $day => $items)
            @php $schedule = $items->first(); @endphp

            <div class="day-card">
                <a href="{{ route('user.jadwal.show', $day) }}" class="link-card">
                    <h2 class="text-2xl font-bold">{{ $day }}</h2>
                    <p class="opacity-80">{{ $schedule->program_note }}</p>
                </a>

                <div class="actions">
                    {{-- EDIT --}}
                    <a href="{{ route('user.jadwal.edit', $schedule->id) }}"
                    class="btn btn-warning">
                        Edit
                    </a>

                    {{-- DELETE --}}
                    <form method="POST"
                        action="{{ route('user.jadwal.destroy', $schedule->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"
                            onclick="return confirm('Hapus jadwal ini?')">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>    
</div>
@endsection
