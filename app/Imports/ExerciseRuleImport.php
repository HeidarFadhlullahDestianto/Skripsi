<?php
namespace App\Imports;

use App\Models\ExerciseRule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExerciseRuleImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new ExerciseRule([
            'usia'          => $row['usia'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tujuan'        => $row['tujuan'],
            'frekuensi'     => $row['frekuensi'],
            'tingkat'       => $row['tingkat'],
            'hari'          => $row['hari'],
            'otot'          => $row['otot'],
            'nama_latihan'  => $row['nama_latihan'],
            'set'           => $row['set'],
            'reps'          => $row['reps'],
            'gambar'        => $row['gambar'],
        ]);
    }
}
