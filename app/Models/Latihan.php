<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    protected $fillable = [
        'name',
        'category',
        'gif',
        'description',
        'steps',
        'image'
    ];

    protected $casts = [
        'steps' => 'array'
    ];
}
