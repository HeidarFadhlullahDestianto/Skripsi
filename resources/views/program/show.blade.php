@extends('layouts.app')

@section('content')

<style>
    .day-list {
        margin-top: 30px;
        display: flex;
        flex-direction: column;
        gap: 18px;
        max-width: 800px;
    }

    .day-card {
        background: rgba(255, 255, 255, 0.85);
        padding: 18px 25px;
        border-radius: 12px;
        font-size: 20px;
        font-weight: 600;
        color: #333;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        transition: 0.2s;
    }

    .day-card:hover {
        background: #f2f2f2;
        transform: translateX(8px);
    }

    .day-link {
        text-decoration: none;
    }

    .title-overlay {
        font-size: 48px;
        font-weight: 800;
        margin-bottom: 20px;
        color: #222;
    }
</style>

<h1 class="title-overlay">{{ $program->title }}</h1>

<div class="day-list">
    @foreach ($program->days as $i => $day)
        <a class="day-link" href="{{ route('user.program.days', $program->id) }}">
            <div class="day-card">
                Day {{ $i+1 }} — {{ $day->title }}
            </div>
        </a>
    @endforeach
</div>

@endsection
