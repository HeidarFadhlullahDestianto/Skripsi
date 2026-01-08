@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
    <div class="container my-4">

        <!-- Tombol kembali -->
        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
            ← Kembali
        </a>

        <!-- Judul -->
        <h2 class="news-title1 mb-0 fs-1 fw-bold text-white">
            {{ $news->title }}
        </h2>

        <!-- Gambar -->
        @if($news->image)
            <div class="news-image-wrapper mb-4">
                <img 
                    src="{{ asset('news/'.$news->image) }}" 
                    alt="{{ $news->title }}"
                    class="img-fluid"
                >
            </div>
        @endif

        <!-- Konten -->
        <div class="news-content">
            {!! nl2br(e($news->content)) !!}
        </div>
    </div>
</div>
@endsection
