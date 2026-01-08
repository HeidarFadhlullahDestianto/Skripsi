@extends('layouts.app')

@section('content')
<div class="content-wrapper mt-3">

    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm mb-3">
        ← Kembali
    </a>

    <h3 class="title">{{ $latihan->name }}</h3>

    @if($latihan->gif)
        <div class="text-center mt-3">
            <div class="image-wrapper">
                <img src="{{ asset('storage/' . $latihan->gif) }}"
                     class="img-fluid latihan-image"
                     alt="GIF Latihan">
            </div>
        </div>
    @endif

    <p class="description mt-3">
        {{ $latihan->description }}
    </p>

    <h5 class="subtitle">Langkah-langkah:</h5>

    <div class="steps-text">
        {!! nl2br(e(implode("\n", $latihan->steps))) !!}
    </div>

</div>

<style>
/* NAVBAR OFFSET – MOBILE ONLY */
@media (max-width: 768px) {
    body {
        padding-top: 70px;
    }
}

.content-wrapper {
    background: rgba(255, 255, 255, 0.95);
    padding: 25px;
    border-radius: 12px;
    max-width: 900px;
    margin: auto;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.title {
    font-weight: bold;
    font-size: 26px;
    text-align: center;
    margin-bottom: 25px;
}

.subtitle {
    margin-top: 25px;
    font-size: 20px;
    font-weight: bold;
}

.description,
.steps-text {
    font-size: 16px;
    line-height: 1.7;
    color: #000;
}

.image-wrapper {
    max-width: 350px;
    margin: auto;
}

.latihan-image {
    width: 100%;
    border-radius: 12px;
}

@media (max-width: 576px) {
    .content-wrapper {
        padding: 15px;
    }
    .image-wrapper {
        max-width: 260px;
    }
    .title {
        font-size: 22px;
    }
}
</style>
@endsection
