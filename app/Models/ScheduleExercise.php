<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleExercise extends Model
{
    protected $fillable = [
        'schedule_id',
        'exercise_name',
        'sets',
        'reps',
    ];
}
