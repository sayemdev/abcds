<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'price',
    ];
}
