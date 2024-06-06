<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPolicy extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'days',
        'employee_ids',
    ];

    protected $casts = [
        'employee_ids' => 'array',
    ];
}
