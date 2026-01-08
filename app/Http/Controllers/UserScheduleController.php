<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Latihan;
use App\Models\Schedule;
use App\Models\ScheduleDetail;
use Illuminate\Support\Facades\Auth;

class UserScheduleController extends Controller
{
    // =========================
    // FORM TAMBAH JADWAL
    // =========================
    public function create()
    {
        $latihans = Latihan::orderBy('name')->get();
        return view('user.jadwal.create', compact('latihans'));
    }

    // =========================
    // SIMPAN JADWAL
    // =========================
    public function store(Request $request)
    {
        // VALIDASI UMUM
        $request->validate([
            'day' => 'required',
            'program_note' => 'required',
        ]);

        // SIMPAN SCHEDULE
        $schedule = Schedule::create([
            'user_id' => Auth::id(),
            'day' => $request->day,
            'program_note' => $request->program_note,
        ]);

        // JIKA REST DAY → STOP
        if ($request->program_note === 'Rest Day') {
            return redirect()
                ->route('user.jadwal.index')
                ->with('success', 'Jadwal Rest Day berhasil disimpan');
        }

        // VALIDASI KHUSUS LATIHAN
        $request->validate([
            'latihan_id' => 'required|array',
            'latihan_id.*' => 'exists:latihans,id',
            'sets' => 'required|array',
            'reps' => 'required|array',
        ]);

        // SIMPAN DETAIL LATIHAN
        foreach ($request->latihan_id as $i => $latihanId) {
            ScheduleDetail::create([
                'schedule_id' => $schedule->id,
                'latihan_id' => $latihanId,
                'sets' => $request->sets[$i],
                'reps' => $request->reps[$i],
            ]);
        }

        return redirect()
            ->route('user.jadwal.index')
            ->with('success', 'Jadwal latihan berhasil disimpan');
    }

    // =========================
    // LIST JADWAL
    // =========================
    public function index()
    {
        $schedules = Schedule::with(['details.latihan'])
            ->where('user_id', Auth::id())
            ->orderByRaw("FIELD(day,'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu')")
            ->get()
            ->groupBy('day');

        return view('user.jadwal.index', compact('schedules'));
    }

    // =========================
    // DETAIL PER HARI
    // =========================
    public function show($day)
    {
        $schedules = Schedule::with(['details.latihan'])
            ->where('user_id', Auth::id())
            ->where('day', $day)
            ->get();

        return view('user.jadwal.show', compact('schedules', 'day'));
    }

    // =========================
    // HAPUS JADWAL
    // =========================
    public function destroy($id)
    {
        Schedule::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return back()->with('success', 'Jadwal berhasil dihapus');
    }

    // =========================
    // FORM EDIT JADWAL
    // =========================
    public function edit($id)
    {
        $schedule = Schedule::with('details')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $latihans = Latihan::orderBy('name')->get();

        return view('user.jadwal.edit', compact('schedule', 'latihans'));
    }

    // =========================
    // UPDATE JADWAL
    // =========================
    public function update(Request $request, $id)
    {
        $schedule = Schedule::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // VALIDASI UMUM
        $request->validate([
            'day' => 'required',
            'program_note' => 'required',
        ]);

        // UPDATE SCHEDULE
        $schedule->update([
            'day' => $request->day,
            'program_note' => $request->program_note,
        ]);

        // HAPUS DETAIL LAMA
        $schedule->details()->delete();

        // JIKA REST DAY → STOP
        if ($request->program_note === 'Rest Day') {
            return redirect()
                ->route('user.jadwal.index')
                ->with('success', 'Jadwal Rest Day berhasil diperbarui');
        }

        // VALIDASI LATIHAN
        $request->validate([
            'latihan_id' => 'required|array',
            'latihan_id.*' => 'exists:latihans,id',
            'sets' => 'required|array',
            'reps' => 'required|array',
        ]);

        // SIMPAN DETAIL BARU
        foreach ($request->latihan_id as $i => $latihanId) {
            ScheduleDetail::create([
                'schedule_id' => $schedule->id,
                'latihan_id' => $latihanId,
                'sets' => $request->sets[$i],
                'reps' => $request->reps[$i],
            ]);
        }

        return redirect()
            ->route('user.jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui');
    }
}
