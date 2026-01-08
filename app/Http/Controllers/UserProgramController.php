<?php

namespace App\Http\Controllers;
use App\Models\Day;

use App\Models\Program;

class UserProgramController extends Controller
{
    // 📌 Menampilkan daftar seluruh program
    public function index()
    {
        $programs = Program::all();
        return view('program.index', compact('programs'));
    }

    // 📌 Menampilkan detail 1 program + daftar hari program
    public function show($id)
    {
        
            return redirect()->route('user.program.days', $id);
        
        
    }

    // 📌 Menampilkan daftar hari dari program tanpa detail
    public function days($program_id)
    {
        $program = Program::with(['days' => function ($query) {
            $query->orderBy('day_number', 'asc');
        }])->findOrFail($program_id);
    
        return view('program.days', compact('program'));
    }
    
    public function dayDetail($program_id, $day_id)
{
    $day = Day::with('exercises')->where('program_id', $program_id)->findOrFail($day_id);

    return view('user.day-detail', compact('day'));
}

}
