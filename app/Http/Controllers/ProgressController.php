<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller {
    public function index() {
        // Ambil semua data milik user yang login
        $data = Progress::where('user_id', Auth::id())
                        ->orderBy('tanggal_catat', 'asc')
                        ->get();

        // Data Grafik
        $labels = $data->map(fn($item) => \Carbon\Carbon::parse($item->tanggal_catat)->format('d/m/Y'));
        $bbData = $data->pluck('berat_badan');
        $tbData = $data->pluck('tinggi_badan');

        return view('progress.index', compact('data', 'labels', 'bbData', 'tbData'));
    }

    public function store(Request $request) {
        $request->validate([
            'berat_badan'   => 'required|numeric',
            'tinggi_badan'  => 'required|numeric',
            'tanggal_catat' => 'required|date',
        ]);

        // Simpan dengan memaksa user_id yang sedang login
        Progress::create([
            'user_id'       => Auth::id(),
            'berat_badan'   => $request->berat_badan,
            'tinggi_badan'  => $request->tinggi_badan,
            'tanggal_catat' => $request->tanggal_catat,
        ]);

        return redirect()->route('progress.index')->with('success', 'Data berhasil disimpan!');
    }
}