<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    // Menampilkan daftar latihan per hari
    public function index($day_id)
    {
        $day = Day::with('exercises')->findOrFail($day_id);

        return view('admin.exercise.index', compact('day'));
    }

    // Form tambah latihan
    public function create($day_id)
    {
        $day = Day::findOrFail($day_id);
        return view('admin.exercise.create', compact('day'));
    }

    // Simpan latihan
    public function store(Request $request, $day_id)
    {
        $request->validate([
            'title' => 'required',
            'sets' => 'required|integer',
            'reps' => 'required|integer',
            'image' => 'nullable|image'
        ]);

        $data = $request->all();
        $data['day_id'] = $day_id;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('exercises');
        }

        Exercise::create($data);

        return back()->with('success', 'Latihan berhasil ditambahkan!');
    }

    // Edit latihan
    public function edit($id)
    {
        $exercise = Exercise::findOrFail($id);
        return view('admin.exercise.edit', compact('exercise'));
    }

    // Update latihan
    public function update(Request $request, $id)
    {
        $exercise = Exercise::findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'sets' => 'required|integer',
            'reps' => 'required|integer',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('exercises');
        }

        $exercise->update($data);

        return back()->with('success', 'Latihan berhasil diperbarui!');
    }

    // Hapus latihan
    public function destroy($id)
    {
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();

        return back()->with('success', 'Latihan berhasil dihapus!');
    }
}
