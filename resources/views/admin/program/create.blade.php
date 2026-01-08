@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<h2>Tambah Program</h2>

<form action="{{ route('admin.program.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Judul Program</label>
    <input type="text" name="title" class="form-control" required>

    <label>Gambar Program</label>
    <input type="file" name="image" class="form-control">

    <button class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection
