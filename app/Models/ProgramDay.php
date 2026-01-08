<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'day_title',
    ];

    // Relasi: Day milik Program
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    // Relasi: 1 Day punya banyak Exercise
    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
}
