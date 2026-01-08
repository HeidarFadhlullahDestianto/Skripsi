@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<div class="container mt-4">

    <h3 class="mb-3">Jadwal Hari - {{ $program->title }}</h3>

    <a href="{{ route('admin.day.create', $program->id) }}" class="btn btn-primary mb-3">
        + Tambah Hari
    </a>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
    ← Kembali
</a>
    <div class="card p-3">
        @foreach ($days as $d)
            <div class="p-3 mb-3 bg-light rounded shadow-sm">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <strong>Day {{ $d->day_number }}</strong> — {{ $d->title }}
                    </div>
                    <div class="d-flex gap-3">
                    <!-- Tombol Tambah Latihan -->
                    <a href="{{ route('admin.exercise.index', $d->id) }}" 
                       class="btn btn-success btn-sm">
                        + Tambah Latihan
                    </a>
                     <!-- Delete Day -->
            <form action="{{ route('admin.day.destroy', $d->id) }}"
                  method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus day ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    🗑 Hapus
                </button>
            </form>
                    
                </div>
</div>
            </div>
        @endforeach
    </div>

</div>
@endsection
