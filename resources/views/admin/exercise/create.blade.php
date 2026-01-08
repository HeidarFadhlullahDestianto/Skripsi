@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<a href="{{route('admin.exercise.index',$day->id)}}" class="btn btn-secondary">
    ← Kembali
</a>
<div class="container mt-4">

    <h3 class="mb-3">Tambah Latihan untuk Hari: {{ $day->title }}</h3>

    <form action="{{ route('admin.exercise.store', $day->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Latihan</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Gambar Latihan</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Set</label>
            <input type="number" name="sets" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Reps</label>
            <input type="number" name="reps" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>

</div>
@endsection
