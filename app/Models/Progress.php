<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional jika nama tabelnya 'progress')
    protected $table = 'progress';

    /**
     * Kolom yang boleh diisi secara massal.
     * Penting agar tidak terkena error 'MassAssignmentException'
     */
    protected $fillable = [
        'user_id',
        'berat_badan',
        'tinggi_badan',
        'tanggal_catat',
    ];

    /**
     * Relasi ke Model User
     * Mengasumsikan setiap data progress dimiliki oleh satu User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}