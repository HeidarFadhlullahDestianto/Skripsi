@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<a href="{{ url()->previous() }}" class="btn btn-secondary ">
    ← Kembali
</a>
<div class="container mt-4">

    <h3>Edit Latihan</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.exercise.update', $exercise->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul latihan --}}
        <div class="mb-3">
            <label class="form-label">Nama Latihan</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $exercise->title) }}" required>
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- Sets --}}
        <div class="mb-3">
            <label class="form-label">Sets</label>
            <input type="number" name="sets" class="form-control" value="{{ old('sets', $exercise->sets) }}" required>
            @error('sets') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- Reps --}}
        <div class="mb-3">
            <label class="form-label">Reps</label>
            <input type="number" name="reps" class="form-control" value="{{ old('reps', $exercise->reps) }}" required>
            @error('reps') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- Gambar lama --}}
        <div class="mb-3">
            <label class="form-label">Gambar Saat Ini</label><br>
            @if($exercise->image)
                <img src="{{ asset('storage/'.$exercise->image) }}" alt="image" width="150" class="rounded mb-2">
            @else
                <p class="text-muted">Tidak ada gambar.</p>
            @endif
        </div>

        {{-- Upload gambar baru --}}
        <div class="mb-3">
            <label class="form-label">Upload Gambar Baru (Opsional)</label>
            <input type="file" name="image" class="form-control">
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Update Latihan</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
