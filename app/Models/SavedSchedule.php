<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedSchedule extends Model
{
    use HasFactory;

    protected $table = 'saved_schedules';

    protected $fillable = [
        'user_id',
        'rule_latihan_id',
        'rentang_umur',
        'jenis_kelamin',
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
}
