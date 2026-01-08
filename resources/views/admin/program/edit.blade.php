@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<h2>Edit Program</h2>

<form action="{{ route('admin.program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Judul Program</label>
    <input type="text" name="title" class="form-control" value="{{ $program->title }}">

    <label>Gambar</label><br>
    @if($program->image)
        <img src="{{ asset('uploads/program/' . $program->image) }}" width="150"><br><br>
    @endif
    <input type="file" name="image" class="form-control">

    <button class="btn btn-success mt-3">Update</button>
</form>

@endsection
