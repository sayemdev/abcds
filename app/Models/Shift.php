<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'min_start',
        'start',
        'max_start',
        'min_end',
        'end',
        'max_end',
        'break_time',
        'days',
        'recurring',
        'repeat_week',
        'endson',
        'status',
    ];

    protected $casts = [
        'days' => 'array',
        'recurring' => 'boolean',
    ];
}
