@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<h2>Daftar Program</h2>

<a href="{{ route('admin.program.create') }}" class="btn btn-primary mb-3">+ Tambah Program</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($programs as $program)
        <tr>
            <td>
                @if($program->image)
                    <img src="{{ asset('uploads/program/' . $program->image) }}" width="120">
                @endif
            </td>
            <td>{{ $program->title }}</td>
            <td>
    <div class="d-flex gap-2 justify-content-center w-100">

        {{-- Kelola Hari --}}
        <a href="{{ route('admin.day.index', $program->id) }}" 
           class="btn btn-info btn-sm">
            Kelola Hari
        </a>

        {{-- Edit Program --}}
        <a href="{{ route('admin.program.edit', $program->id) }}" 
           class="btn btn-warning btn-sm">
            Edit
        </a>

        {{-- Hapus Program --}}
        <form action="{{ route('admin.program.delete', $program->id) }}" method="POST">
            @csrf 
            @method('DELETE')
            <button onclick="return confirm('Hapus program?')" class="btn btn-danger btn-sm">
                Hapus
            </button>
        </form>

    </div>
</td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection
