@extends('layouts.app')

@section('content')
<div class="container page-wrapper">

    <div class="card shadow border-0">
        <div class="card-body">

            <h4 class="mb-3 text-center fw-bold">
                📅 Jadwal Latihan Mingguan
            </h4>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">Hari 1: {{ $rule->hari_1 }}</li>
                <li class="list-group-item">Hari 2: {{ $rule->hari_2 }}</li>
                <li class="list-group-item">Hari 3: {{ $rule->hari_3 }}</li>
                <li class="list-group-item">Hari 4: {{ $rule->hari_4 }}</li>
                <li class="list-group-item">Hari 5: {{ $rule->hari_5 }}</li>
                <li class="list-group-item">Hari 6: {{ $rule->hari_6 }}</li>
                <li class="list-group-item">Hari 7: {{ $rule->hari_7 }}</li>
            </ul>

        </div>
    </div>

</div>
@endsection
