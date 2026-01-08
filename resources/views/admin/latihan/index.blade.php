@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<div class="container">
    <h3>Manajemen Latihan</h3>

    <a href="{{ route('admin.latihan.create') }}" class="btn btn-primary mb-3">Tambah Latihan</a>
    
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Kategori</th>
            <th>GIF</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        @foreach ($latihan as $l)
        <tr>
            <td>{{ $l->name }}</td>
            <td>{{ $l->category }}</td>

            {{-- GIF Preview --}}
            <td>
                @if($l->gif)
                    <img src="{{ asset('storage/' . $l->gif) }}" width="80">
                @else
                    <span class="text-muted">Tidak ada GIF</span>
                @endif
            </td>

            {{-- Gambar Preview --}}
            <td>
                @if($l->image)
                    <img src="{{ asset('storage/' . $l->image) }}" width="80">
                @else
                    <span class="text-muted">Tidak ada gambar</span>
                @endif
            </td>

            <td>
                <a href="{{ route('admin.latihan.edit', $l->id) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('admin.latihan.delete', $l->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
