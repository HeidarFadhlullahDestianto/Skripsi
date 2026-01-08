<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
    ];

    // Relasi: 1 Program punya banyak Day
    public function days()
    {
        return $this->hasMany(Day::class);
    }
}
