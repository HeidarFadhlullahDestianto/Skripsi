@extends('layouts.app')

@section('content')
<style>
    .page-bg {
        min-height: 100vh;
        background: linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)),
            url('/images/gym-bg.jpg') center/cover no-repeat;
        padding: 40px 16px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-form {
        background: #fff;
        width: 100%;
        max-width: 850px;
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 20px 40px rgba(0,0,0,.25);
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
    }

    input, select {
        width: 100%;
        padding: 10px 12px;
        border-radius: 10px;
        border: 1px solid #ddd;
    }

    .exercise-item {
        background: #f9fafb;
        border-radius: 12px;
        padding: 16px;
        margin-bottom: 16px;
        border: 1px solid #eee;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
    }

    .btn {
        padding: 12px 18px;
        border-radius: 12px;
        border: none;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-dark {
        background: #111;
        color: #fff;
    }

    .btn-primary {
        background: #2563eb;
        color: #fff;
    }

    .btn-danger {
        background: #dc2626;
        color: #fff;
    }

    .btn-full {
        width: 100%;
        margin-top: 16px;
    }
</style>
<div class="pt-5 pt-md-0">
    <div class="page-bg">
        <div class="card-form">

            <h2 class="text-2xl font-bold mb-6 text-center">
                Edit Jadwal Latihan
            </h2>

            <form method="POST" action="{{ route('user.jadwal.update', $schedule->id) }}">
                @csrf
                @method('PUT')

                {{-- HARI --}}
                <div class="form-group">
                    <label>Hari Latihan</label>
                    <select name="day">
                        @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $day)
                            <option value="{{ $day }}"
                                {{ $schedule->day == $day ? 'selected' : '' }}>
                                {{ $day }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- LIST LATIHAN --}}
                <div id="exercise-wrapper">
                    @foreach ($schedule->details as $detail)
                        <div class="exercise-item">
                            <div class="form-group">
                                <label>Jenis Latihan</label>
                                <select name="latihan_id[]">
                                    @foreach ($latihans as $latihan)
                                        <option value="{{ $latihan->id }}"
                                            {{ $detail->latihan_id == $latihan->id ? 'selected' : '' }}>
                                            {{ $latihan->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="grid-2">
                                <div>
                                    <label>Set</label>
                                    <input type="number"
                                        name="sets[]"
                                        value="{{ $detail->sets }}">
                                </div>
                                <div>
                                    <label>Reps</label>
                                    <input type="number"
                                        name="reps[]"
                                        value="{{ $detail->reps }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- TAMBAH LATIHAN --}}
                <button type="button"
                        id="addExercise"
                        class="btn btn-dark btn-full">
                    + Tambah Jenis Latihan
                </button>

                {{-- PROGRAM --}}
                <div class="form-group mt-4">
                    <label>Catatan Program</label>
                    <select name="program_note">
                        @foreach (['Push Day','Pull Day','Upper Body','Lower Body','Cardio','Rest Day'] as $note)
                            <option value="{{ $note }}"
                                {{ $schedule->program_note == $note ? 'selected' : '' }}>
                                {{ $note }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- SIMPAN --}}
                <button class="btn btn-primary btn-full">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>
{{-- TEMPLATE --}}
<template id="exercise-template">
    <div class="exercise-item">
        <div class="form-group">
            <label>Jenis Latihan</label>
            <select name="latihan_id[]">
                @foreach ($latihans as $latihan)
                    <option value="{{ $latihan->id }}">
                        {{ $latihan->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid-2">
            <div>
                <label>Set</label>
                <input type="number" name="sets[]" placeholder="3" required>
            </div>
            <div>
                <label>Reps</label>
                <input type="number" name="reps[]" placeholder="12" required>
            </div>
        </div>
    </div>
</template>

<script>
document.getElementById('addExercise').addEventListener('click', function () {
    document.getElementById('exercise-wrapper')
        .insertAdjacentHTML(
            'beforeend',
            document.getElementById('exercise-template').innerHTML
        );
});
</script>
@endsection
