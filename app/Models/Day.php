<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'day_number',
        'title'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    // RELASI EXERCISES (WAJIB ADA)
    public function exercises()
    {
        return $this->hasMany(Exercise::class, 'day_id');
    }
}
