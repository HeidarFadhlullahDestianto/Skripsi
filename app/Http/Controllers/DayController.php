<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Program;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index($program_id)
    {
        $program = Program::findOrFail($program_id);
        $days = $program->days()->orderBy('day_number')->get();

        return view('admin.day.index', compact('program', 'days'));
    }

    public function create($program_id)
    {
        $program = Program::findOrFail($program_id);
        return view('admin.day.create', compact('program'));
    }

    public function store(Request $request, $program_id)
    {
        $request->validate([
            'day_number' => 'required|integer',
            'title' => 'required'
        ]);

        Day::create([
            'program_id' => $program_id,
            'day_number' => $request->day_number,
            'title' => $request->title,
        ]);

        return redirect()->route('admin.day.index', $program_id)
                         ->with('success', 'Day berhasil ditambahkan!');
    }
    public function destroy($id)
{
    $day = Day::findOrFail($id);

    $program_id = $day->program_id;

    $day->delete();

    return redirect()
        ->route('admin.day.index', $program_id)
        ->with('success', 'Day berhasil dihapus!');
}
protected static function booted()
{
    static::deleting(function ($day) {
        $day->exercises()->delete();
    });
}

}
