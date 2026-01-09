<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuleLatihan extends Model
{
    use HasFactory;

    protected $table = 'rule_latihans';

    protected $fillable = [
        'rentang_umur',
        'kategori_umur',
        'jenis_kelamin',
        'tingkat_kesulitan',
        'tujuan_latihan',
        'frekuensi',

        'hari_1','latihan_1',
        'hari_2','latihan_2',
        'hari_3','latihan_3',
        'hari_4','latihan_4',
        'hari_5','latihan_5',
        'hari_6','latihan_6',
        'hari_7','latihan_7',
    ];
}
