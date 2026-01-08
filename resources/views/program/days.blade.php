@extends('layouts.app')

@section('content')

<div class="pt-5 pt-md-0">
    <div class="container mt-4">

        <a href="{{ route('program.index') }}" class="btn btn-secondary mb-3">
            ← Kembali
        </a>
        <div class="container my-4">
        <div class="card text-dark border-0 shadow"
         style="background: linear-gradient(135deg, #ecf9ff, #ccefff, #f4fcff);">
        <div class="card-body py-4">
            <h2 class="mb-0 fs-1 fw-bold">
            Hari Dalam Program: <strong>{{ $program->title }}</strong>
        </h2>
        </h2>
        </div>
    </div>
</div>

        <div class="list-group">
            @foreach ($program->days as $day)
                <a href="{{ route('user.day.detail', ['program_id' => $program->id, 'day_id' => $day->id]) }}"
                   class="list-group-item list-group-item-action py-3">
                    <strong>Day {{ $day->day_number }}:</strong> {{ $day->title }}
                </a>
            @endforeach
        </div>

    </div>
</div>

@endsection
