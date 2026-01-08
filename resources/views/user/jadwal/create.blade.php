@extends('layouts.app')

@section('content')
<style>
    body { margin: 0; }

    .page-bg {
        min-height: 100vh;
        background: linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)),
        url('/images/gym-bg.jpg') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px 12px;
    }

    .card-form {
        background: #fff;
        border-radius: 16px;
        width: 100%;
        max-width: 800px;
        padding: 28px;
        box-shadow: 0 20px 40px rgba(0,0,0,.2);
    }

    h2 { text-align: center; margin-bottom: 24px; }

    .form-group { margin-bottom: 18px; }

    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
    }

    input, select {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #ddd;
    }

    .exercise-item {
        border: 1px solid #eee;
        padding: 16px;
        border-radius: 12px;
        margin-bottom: 16px;
        background: #fafafa;
        position: relative;
    }

    .delete-exercise {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #ef4444;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 4px 8px;
        cursor: pointer;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    @media (max-width: 640px) {
        .grid-2 { grid-template-columns: 1fr; }
        .card-form { padding: 20px; }
    }

    .btn {
        padding: 14px;
        border-radius: 12px;
        border: none;
        cursor: pointer;
        font-weight: 600;
    }

    .btn-dark { background: #111; color: #fff; }
    .btn-primary { background: #2563eb; color: #fff; }
    .btn-full { width: 100%; margin-top: 16px; }
</style>
<div class="pt-5 pt-md-0">
    <div class="page-bg">
    <div class="card-form">

    <h2>Tambah Jadwal Latihan</h2>

    <form method="POST" action="{{ route('user.jadwal.store') }}">
    @csrf

    <div class="form-group">
        <label>Hari Latihan</label>
        <select name="day" required>
            <option value="">-- Pilih Hari --</option>
            <option>Senin</option>
            <option>Selasa</option>
            <option>Rabu</option>
            <option>Kamis</option>
            <option>Jumat</option>
            <option>Sabtu</option>
        </select>
    </div>

    <div class="form-group">
        <label>Catatan Program</label>
        <select name="program_note" id="programNote" required>
            <option value="">-- Pilih Program --</option>
            <option>Push Day</option>
            <option>Pull Day</option>
            <option>Upper Body</option>
            <option>Lower Body</option>
            <option>Cardio</option>
            <option>Rest Day</option>
        </select>
    </div>

    <div id="exercise-wrapper">

        <div class="exercise-item">
            <button type="button" class="delete-exercise">✕</button>

            <div class="form-group">
                <label>Jenis Latihan</label>
                <select name="latihan_id[]" required>
                    <option value="">-- Pilih Latihan --</option>
                    @foreach ($latihans as $latihan)
                        <option value="{{ $latihan->id }}">{{ $latihan->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid-2">
                <div>
                    <label>Set</label>
                    <input type="number" name="sets[]" value="3" min="1" required>
                </div>
                <div>
                    <label>Reps</label>
                    <input type="number" name="reps[]" value="12" min="1" required>
                </div>
            </div>
        </div>

    </div>

<button type="button" id="addExercise" class="btn btn-dark btn-full">
+ Tambah Jenis Latihan
</button>

<button type="submit" class="btn btn-primary btn-full">
Simpan Jadwal
</button>

</form>
</div>
</div>

<template id="exercise-template">
<div class="exercise-item">
    <button type="button" class="delete-exercise">✕</button>

    <div class="form-group">
        <label>Jenis Latihan</label>
        <select name="latihan_id[]" required>
            <option value="">-- Pilih Latihan --</option>
            @foreach ($latihans as $latihan)
                <option value="{{ $latihan->id }}">{{ $latihan->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="grid-2">
        <div>
            <label>Set</label>
            <input type="number" name="sets[]" value="3" min="1" required>
        </div>
        <div>
            <label>Reps</label>
            <input type="number" name="reps[]" value="12" min="1" required>
        </div>
    </div>
</div>
</div>
</template>

<script>
const programNote = document.getElementById('programNote');
const wrapper = document.getElementById('exercise-wrapper');
const addBtn = document.getElementById('addExercise');

function toggleExercise() {
    const isRestDay = programNote.value === 'Rest Day';
    wrapper.style.display = isRestDay ? 'none' : 'block';
    addBtn.style.display = isRestDay ? 'none' : 'block';

    wrapper.querySelectorAll('select, input').forEach(el => {
        isRestDay ? el.removeAttribute('required') : el.setAttribute('required','required');
    });
}

programNote.addEventListener('change', toggleExercise);

addBtn.addEventListener('click', () => {
    wrapper.insertAdjacentHTML('beforeend',
        document.getElementById('exercise-template').innerHTML
    );
    toggleExercise();
});

wrapper.addEventListener('click', e => {
    if (e.target.classList.contains('delete-exercise')) {
        if (wrapper.querySelectorAll('.exercise-item').length > 1) {
            e.target.closest('.exercise-item').remove();
        } else {
            alert('Minimal harus ada 1 latihan');
        }
    }
});

toggleExercise();
</script>
@endsection
