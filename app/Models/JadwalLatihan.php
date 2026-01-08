<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalLatihan extends Model
{
    protected $table = 'jadwal_latihans';

    protected $fillable = [
        'rule_latihan_id',
        'tujuan_latihan',
        'frekuensi',
        'hari_1','hari_2','hari_3','hari_4','hari_5','hari_6','hari_7'
    ];
}
