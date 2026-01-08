@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Slider</h3>
    <a href="{{ route('sliders.create') }}" class="btn btn-primary mb-3">Tambah Slider</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
            <tr>
                <td><img src="{{ asset('storage/' . $slider->image) }}" width="100"></td>
                <td>{{ $slider->title }}</td>
                <td>{{ $slider->description }}</td>
                <td>
                    <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

