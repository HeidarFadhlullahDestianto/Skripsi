@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<a href="{{ url()->previous() }}" class="btn btn-secondary">
    ← Kembali
</a>
<div class="container">
    <h3>Tambah Latihan</h3>

    <form action="{{ route('admin.latihan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama</label>
        <input type="text" name="name" class="form-control">

        <label>Kategori</label>
        <input type="text" name="category" class="form-control">

        <label>GIF Latihan</label>
        <input type="file" name="gif" class="form-control" accept="image/gif">

        <label>Deskripsi</label>
        <textarea name="description" class="form-control"></textarea>

        <label>Langkah-langkah (1 baris = 1 langkah)</label>
        <textarea name="steps" rows="5" class="form-control"></textarea>

        <label>Gambar</label>
        <input type="file" name="image" class="form-control">

        <button class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection
