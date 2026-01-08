@extends('layouts.app')

@section('content')
<div class="container mt-4">

    @if(!empty($sliders) && count($sliders) > 0)
    <div class="d-flex justify-content-center">
        <div id="adminCarousel" class="carousel slide w-100" style="max-width: 1100px;" data-bs-ride="carousel">

            <div class="carousel-inner">

                @foreach($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                    <img src="{{ asset('storage/' . ($slider->image ?? '')) }}"
                         class="d-block w-100 rounded-4 shadow"
                         style="height: 350px; object-fit: cover;"
                         alt="{{ $slider->title ?? 'Slider' }}">

                         <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                            <div class="bg-dark bg-opacity-50 text-white p-3 rounded" style="max-width: 80%;">
                                <h4 class="mb-2">{{ $slider->title ?? '' }}</h4>
                            <p class="mb-0">{{ $slider->description ?? '' }}</p>
                            </div>
                        </div>


                </div>
                @endforeach

            </div>

            <button class="carousel-control-prev" style="width:60px" type="button"
                data-bs-target="#adminCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon rounded-circle p-3 bg-dark bg-opacity-50"></span>
            </button>

            <button class="carousel-control-next" style="width:60px" type="button"
                data-bs-target="#adminCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon rounded-circle p-3 bg-dark bg-opacity-50"></span>
            </button>

        </div>
    </div>
    @else
        <div class="alert alert-info text-center">Belum ada slider ditambahkan.</div>
    @endif

</div>



@endsection
