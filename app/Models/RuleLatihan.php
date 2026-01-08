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
        'hari_1','hari_2','hari_3','hari_4','hari_5','hari_6','hari_7'
    ];
    
}
