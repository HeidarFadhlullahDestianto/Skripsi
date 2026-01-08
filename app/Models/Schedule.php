<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = [
        'user_id',
        'day',
        'program_note',
    ];

    // 🔗 Relasi ke detail latihan
    public function details()
    {
        return $this->hasMany(ScheduleDetail::class);
    }

    // 🔗 Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
