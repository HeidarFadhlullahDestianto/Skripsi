@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
{{-- HERO SECTION --}}
<section class="hero-section">
    <div class="hero-overlay"></div>

    <div class="container hero-content">
        <h1 class="fw-bold mb-3">Daftar Latihan</h1>

        {{-- SEARCH & FILTER --}}
        <form method="GET" action="{{ route('user.latihan.index') }}">
            <div class="row g-2">
                <div class="col-md-6">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari nama latihan..."
                        value="{{ request('search') }}"
                    >
                </div>

                <div class="col-md-4">
                    <select name="category" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat }}"
                                {{ request('category') == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-dark w-100">Cari</button>
                </div>
            </div>
        </form>
    </div>
</section>

{{-- CONTENT --}}
<div class="container mt-5 mb-5">

    {{-- TOMBOL TAMBAH --}}
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('user.jadwal.create') }}"
           class="btn btn-dark btn-sm">
            + Tambah Jadwal
        </a>
    </div>

    {{-- WRAPPER PUTIH (PENTING) --}}
    <div class="bg-white p-4 rounded shadow-sm">

        @if ($kategori->isEmpty())
            <div class="alert alert-warning">
                Latihan tidak ditemukan.
            </div>
        @endif

        @foreach ($kategori->sortKeys() as $namaKategori => $items)
            <h3 class="mt-4 fw-bold text-dark">{{ $namaKategori }}</h3>

            <ul class="list-group mb-3">
                @foreach ($items as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-dark">
                            {{ $item->name }}
                        </span>
                        <a href="{{ route('user.latihan.show', $item->id) }}"
                           class="btn btn-dark btn-sm">
                            Detail
                        </a>
                    </li>
                @endforeach
            </ul>
        @endforeach

    </div>
</div>

@endsection
