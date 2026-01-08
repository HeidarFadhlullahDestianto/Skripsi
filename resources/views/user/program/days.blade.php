@extends('layouts.app')

@section('content')
<div class="container mt-4">

    

    <h2 class="mb-4 fs-2 fw-bold">Hari Dalam Program: <strong>{{ $program->title }}</strong></h2>

    <div class="list-group">

        @foreach ($program->days as $day)
            <a href="{{ route('user.day.detail', ['program_id' => $program->id, 'day_id' => $day->id]) }}"
               class="list-group-item list-group-item-action py-3">
                <strong>Day {{ $day->day_number }}:</strong> {{ $day->title }}
            </a>
        @endforeach

    </div>

</div>
@endsection
