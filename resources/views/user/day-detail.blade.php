@extends('layouts.app')

@section('content')

<div class="pt-5 pt-md-0">
    <div class="container mt-4">

        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
            ← Kembali
        </a>
        <div class="container my-4">
    <div class="card text-dark border-0 shadow"
         style="background: linear-gradient(135deg, #ecf9ff, #ccefff, #f4fcff);">
        <div class="card-body py-4">
            <h2 class="mb-0 fs-1 fw-bold">
                Latihan untuk <strong>{{ $day->title }}</strong>
            </h2>
        </div>
    </div>
</div>


        @if ($day->exercises->count() == 0)
            <div class="alert alert-warning">
                Belum ada latihan untuk hari ini.
            </div>
        @else
            <div class="row">
                @foreach ($day->exercises as $exercise)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            @if($exercise->image)
                                <img src="{{ asset('uploads/exercise/' . $exercise->image) }}"
                                     class="card-img-top"
                                     style="height: 180px; object-fit: cover;">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $exercise->title }}</h5>

                                <p class="card-text mb-1">
                                    <strong>Set :</strong> {{ $exercise->sets }}
                                </p>

                                <p class="card-text mb-1">
                                    <strong>Reps :</strong> {{ $exercise->reps }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>

@endsection
