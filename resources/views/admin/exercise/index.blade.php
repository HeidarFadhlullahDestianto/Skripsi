@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<h2>Latihan untuk {{ $day->day_title }}</h2>

<a href="{{ route('admin.exercise.create', $day->id) }}" class="btn btn-primary">Tambah Latihan</a>
<a href="{{route('admin.day.index',$day->program_id)}}" class="btn btn-secondary">
    ← Kembali
</a>
<table class="table mt-3">
    <tr>
        <th>Gambar</th>
        <th>Nama Latihan</th>
        <th>Set</th>
        <th>Reps</th>
        <th>Aksi</th>
    </tr>

    @foreach ($day->exercises as $exercise)
    <tr>
        <td><img src="/storage/{{ $exercise->image }}" width="80"></td>
        <td>{{ $exercise->title }}</td>
        <td>{{ $exercise->sets }}</td>
        <td>{{ $exercise->reps }}</td>
        <td>
            <a href="{{ route('admin.exercise.edit', $exercise->id) }}" class="btn btn-sm btn-warning">Edit</a>

            <form action="{{ route('admin.exercise.delete', $exercise->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection
