@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<h2 class="mb-4 fs-1 fw-bold text-white">Berita Terbaru</h2>

<div class="row">
    @foreach($news as $n)
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card h-100 news-card">

            @if($n->image)
                <img 
                    src="{{ asset('news/'.$n->image) }}" 
                    class="card-img-top news-img"
                    alt="{{ $n->title }}"
                >
            @endif

            <div class="card-body d-flex flex-column">
                <h5 class="card-title news-title">
                    {{ $n->title }}
                </h5>

                <div class="mt-auto">
                    <a href="{{ route('news.show', $n->slug) }}" class="btn btn-primary w-100">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>

        </div>
    </div>
    @endforeach
</div>
</div>
<div class="mt-4">
    {{ $news->links() }}
</div>
@endsection
