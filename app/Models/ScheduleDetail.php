<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleDetail extends Model
{
    use HasFactory;

    protected $table = 'schedule_details';

    protected $fillable = [
        'schedule_id',
        'latihan_id',
        'sets',
        'reps',
    ];

    // 🔗 Relasi ke jadwal
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    // 🔗 Relasi ke master latihan
    public function latihan()
    {
        return $this->belongsTo(Latihan::class);
    }
}
