<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertRule extends Model
{
    use HasFactory;

    /**
     * Nama tabel (opsional, tapi aman ditulis)
     */
    protected $table = 'expert_rules';

    /**
     * Mass assignment
     */
    protected $fillable = [
        'rentang_umur',
        'kategori_umur',
        'jenis_kelamin',
        'tingkat_kesulitan',
        'tujuan_latihan',
        'frekuensi',
        'hari_1',
        'hari_2',
        'hari_3',
        'hari_4',
        'hari_5',
        'hari_6',
        'hari_7',
    ];

    /**
     * Optional: Casting data
     * (berguna kalau nanti mau diolah lebih lanjut)
     */
    protected $casts = [
        'frekuensi' => 'string',
    ];

    /**
     * Helper: ambil semua jadwal dalam bentuk array
     */
    public function getJadwalArray()
    {
        return [
            'Hari 1' => $this->hari_1,
            'Hari 2' => $this->hari_2,
            'Hari 3' => $this->hari_3,
            'Hari 4' => $this->hari_4,
            'Hari 5' => $this->hari_5,
            'Hari 6' => $this->hari_6,
            'Hari 7' => $this->hari_7,
        ];
    }
}
