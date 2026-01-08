@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<h2>Manajemen Berita</h2>

<a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">+ Tambah Berita</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($news as $n)
        <tr>
            <td>
                @if($n->image)
                    <img src="{{ asset('news/'.$n->image) }}" width="120">
                @else
                    <small>Tidak ada gambar</small>
                @endif
            </td>

            <td>{{ $n->title }}</td>
            
            <td>
            <a href="{{ route('admin.news.edit', $n->id) }}" class="btn btn-warning btn-sm">
    Edit
</a>

                <form action="{{ route('admin.news.destroy', $n->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus berita?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $news->links() }}
@endsection
