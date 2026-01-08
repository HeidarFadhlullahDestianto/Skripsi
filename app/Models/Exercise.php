<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['day_id', 'title', 'sets', 'reps', 'image'];

    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id');
    }
}
