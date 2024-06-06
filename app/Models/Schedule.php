<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee',
        'date',
        'shift_id',
        'accept_extra_hours',
        'status',
    ];

    protected $casts = [
        'employees' => 'array',
        'accept_extra_hours' => 'boolean',
    ];

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
