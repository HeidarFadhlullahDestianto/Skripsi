<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExerciseRule extends Model
{
    protected $fillable = [
        'usia',
        'jenis_kelamin',
        'tujuan',
        'frekuensi',
        'tingkat',
        'hari',
        'otot',
        'nama_latihan',
        'set',
        'reps',
        'gambar'
    ];
}
