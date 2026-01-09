<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RuleLatihan;
use App\Models\SavedSchedule;

class ExpertController extends Controller
{
    /* =========================
       FORM
    ========================= */
    public function index()
    {
        return view('user.expert.index');
    }

    /* =========================
       REKOMENDASI (FORWARD CHAINING)
    ========================= */
    public function recommend(Request $request)
    {
        $request->validate([
            'usia'              => 'required|numeric',
            'jenis_kelamin'     => 'required',
            'tingkat_kesulitan' => 'required',
            'tujuan_latihan'    => 'required',
            'frekuensi'         => 'required',
        ]);

        // RENTANG UMUR SESUAI EXCEL
        $usia = (int) $request->usia;

        if ($usia >= 12 && $usia <= 18) {
            $rentang_umur = '12-19';
        } elseif ($usia >= 19 && $usia <= 45) {
            $rentang_umur = '19-45';
        } else {
            $rentang_umur = '45-60';
        }

        // QUERY RULE (EXACT MATCH EXCEL)
        $rules = RuleLatihan::where([
            'rentang_umur'      => $rentang_umur,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'tingkat_kesulitan' => $request->tingkat_kesulitan,
            'tujuan_latihan'    => $request->tujuan_latihan,
            'frekuensi'         => $request->frekuensi,
        ])->get();

       

        return view('user.expert.result', compact('rules'));
    }

    /* =========================
       DETAIL JADWAL
    ========================= */
    public function detail($id)
    {
        $rule = RuleLatihan::findOrFail($id);
        return view('user.expert.detail', compact('rule'));
    }

    /* =========================
       SIMPAN JADWAL
    ========================= */
    public function save($id)
{
    $rule = RuleLatihan::findOrFail($id);

    SavedSchedule::create([
        'user_id'         => auth()->id(),
        'rule_latihan_id' => $rule->id,
        'rentang_umur'    => $rule->rentang_umur,
        'jenis_kelamin'   => $rule->jenis_kelamin,
        'tujuan_latihan'  => $rule->tujuan_latihan,
        'frekuensi'       => $rule->frekuensi,

        'hari_1'     => $rule->hari_1,
        'latihan_1'  => $rule->latihan_1,

        'hari_2'     => $rule->hari_2,
        'latihan_2'  => $rule->latihan_2,

        'hari_3'     => $rule->hari_3,
        'latihan_3'  => $rule->latihan_3,

        'hari_4'     => $rule->hari_4,
        'latihan_4'  => $rule->latihan_4,

        'hari_5'     => $rule->hari_5,
        'latihan_5'  => $rule->latihan_5,

        'hari_6'     => $rule->hari_6,
        'latihan_6'  => $rule->latihan_6,

        'hari_7'     => $rule->hari_7,
        'latihan_7'  => $rule->latihan_7,
    ]);

    return redirect()->route('expert.saved')
        ->with('success', '✅ Jadwal berhasil disimpan');
}


    /* =========================
       HALAMAN JADWAL TERSIMPAN
    ========================= */
    public function saved()
    {
        $schedules = SavedSchedule::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.expert.saved', compact('schedules'));
    }
    public function destroy($id)
{
    $schedule = SavedSchedule::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

    $schedule->delete();

    return redirect()->route('expert.saved')
        ->with('success', '🗑️ Jadwal berhasil dihapus');
}
}
