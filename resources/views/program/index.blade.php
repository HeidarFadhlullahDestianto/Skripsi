@extends('layouts.app')

@section('content')

<div class="pt-5 pt-md-0">
    <span class="fs-1 fw-bold">PROGRAM</span>

    <div class="program-list">
        @foreach ($programs as $p)
            <a href="{{ route('program.show', $p->id) }}">
                <div class="program-card">
                    <img src="{{ asset('uploads/program/' . $p->image) }}">
                    <div class="program-title">{{ $p->title }}</div>
                </div>
            </a>
        @endforeach
    </div>
</div>

@endsection
