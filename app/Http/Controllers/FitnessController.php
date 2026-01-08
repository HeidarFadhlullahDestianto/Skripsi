<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FitnessController extends Controller
{
    public function create()
    {
        return view('jadwalkan');
    }

    public function store(Request $request)
    {
        // Tidak disimpan ke database, hanya diteruskan ke view hasil
        return view('hasil', [
            'data' => $request->all()
        ]);
    }
}
