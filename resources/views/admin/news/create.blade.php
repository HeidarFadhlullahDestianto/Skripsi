@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<h2>Tambah Berita</h2>

<form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="mb-3">
        <label>Konten Berita</label>
        <textarea name="content" class="form-control" rows="5"></textarea>
    </div>

    <div class="mb-3">
        <label>Gambar (opsional)</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
