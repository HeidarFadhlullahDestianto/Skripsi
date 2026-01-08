@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<div class="container mt-4">
    <h3>Tambah Hari untuk Program: {{ $program->title }}</h3>
    
    <div class="card p-4 mt-3">
        <form action="{{ route('admin.day.store', $program->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Hari Ke</label>
                <input type="number" name="day_number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Judul (contoh: Dada & Tricep)</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.day.index', $program->id) }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
