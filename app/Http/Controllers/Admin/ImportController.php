<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\RuleLatihan;

class ImportController extends Controller
{
    /**
     * Halaman upload Excel
     */
    public function index()
    {
        return view('admin.import');
    }

    /**
     * Proses import Excel ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $spreadsheet = IOFactory::load(
            $request->file('file')->getPathname()
        );

        $rows = $spreadsheet->getActiveSheet()->toArray();

        unset($rows[0]); // hapus header

        foreach ($rows as $row) {
            RuleLatihan::create([
                'rentang_umur'      => $row[0] ?? null,
                'kategori_umur'     => $row[1] ?? null,
                'jenis_kelamin'     => $row[2] ?? null,
                'tingkat_kesulitan' => $row[3] ?? null,
                'tujuan_latihan'    => $row[4] ?? null,
                'frekuensi'         => $row[5] ?? null,
                'hari_1'            => $row[6] ?? null,
                'hari_2'            => $row[7] ?? null,
                'hari_3'            => $row[8] ?? null,
                'hari_4'            => $row[9] ?? null,
                'hari_5'            => $row[10] ?? null,
                'hari_6'            => $row[11] ?? null,
                'hari_7'            => $row[12] ?? null,
            ]);
        }

        return redirect()->back()->with('success', 'Data berhasil diimport');
    }
}
