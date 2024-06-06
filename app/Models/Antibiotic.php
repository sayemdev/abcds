<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antibiotic extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'shortcut',
        'commercial_name',
    ];
}
