@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<a href="{{ url()->previous() }}" class="btn btn-secondary">
    ← Kembali
</a>
<div class="container">
    <h3 class="fw-bold">Edit Latihan</h3>

    <form action="{{ route('admin.latihan.update', $latihan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <label>Nama Latihan</label>
        <input type="text" name="name" value="{{ $latihan->name }}" class="form-control mb-2">

        <label>Kategori</label>
        <input type="text" name="category" value="{{ $latihan->category }}" class="form-control mb-2">

        <label>GIF Latihan</label>
<input type="file" name="gif" class="form-control mb-2" accept="image/gif">

@if($latihan->gif)
    <p class="mt-2 fw-semibold">GIF Saat Ini:</p>
    <img src="{{ asset('gif/'.$latihan->gif) }}" width="150" class="mb-3">
@endif


        <label>Deskripsi</label>
        <textarea name="description" class="form-control mb-2">{{ $latihan->description }}</textarea>

        <label>Langkah-langkah</label>
        <textarea name="steps" class="form-control mb-2">{{ implode("\n", $latihan->steps) }}</textarea>

        <label>Gambar Baru</label>
        <input type="file" name="image" class="form-control mb-2">

        <img src="{{ asset('storage/'.$latihan->image) }}" width="120" class="mt-3">

        <button class="btn btn-dark mt-3">Update</button>
    </form>
</div>
@endsection
