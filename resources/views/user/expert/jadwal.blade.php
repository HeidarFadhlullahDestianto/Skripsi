@extends('layouts.app')
@section('content')
    <div class="container mt-4">
    @foreach($jadwals as $j)
    <div class="card mb-3">
    <div class="card-body">
    <h5>{{ $j->tujuan_latihan }}</h5>
    <p>{{ $j->frekuensi }}</p>
    </div>
    </div>
    @endforeach
    </div>
    @endsection
