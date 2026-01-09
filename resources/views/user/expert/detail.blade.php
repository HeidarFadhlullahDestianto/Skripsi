@extends('layouts.app')

@section('content')
<div class="pt-5 pt-md-0">
<div class="container page-wrapper mt-4">

    <div class="card shadow border-0">
        <div class="card-body">

            <h4 class="mb-4 text-center fw-bold">
                📅 Jadwal Latihan Mingguan
            </h4>

            <div class="row g-3">
                @for($i = 1; $i <= 7; $i++)
                    @if($rule->{'hari_'.$i})
                    <div class="col-12 col-md-6">
                        <div class="border rounded p-3 h-100">

                            {{-- LABEL HARI --}}
                            <div class="text-muted small mb-1">
                                Hari ke-{{ $i }}
                            </div>

                            {{-- PROGRAM --}}
                            <div class="fw-bold text-primary">
                                {{ $rule->{'hari_'.$i} }}
                            </div>

                            {{-- LATIHAN --}}
                            <div class="text-muted mt-1">
                                @if(!empty($rule->{'latihan_'.$i}))
                                    {{ $rule->{'latihan_'.$i} }}
                                @else
                                    <em>Tidak ada latihan</em>
                                @endif
                            </div>

                        </div>
                    </div>
                    @endif
                @endfor
            </div>

        </div>
    </div>

</div>
@endsection
