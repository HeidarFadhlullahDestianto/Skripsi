@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<h2>Edit Berita</h2>

<form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control"
               value="{{ old('title', $news->title) }}" required>
    </div>

    <div class="mb-3">
        <label>Isi Berita</label>
        <textarea name="content" class="form-control" rows="5" required>{{ old('content', $news->content) }}</textarea>
    </div>

    <div class="mb-3">
        <label>Gambar</label><br>

        @if($news->image)
            <img src="{{ asset('news/'.$news->image) }}" width="200" class="mb-2">
        @endif

        <input type="file" name="image" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
