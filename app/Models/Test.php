<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'name',
        'category_id',
        'shortcut',
        'sample_type',
        'unit',
        'reference_range',
        'type',
        'separated',
        'price',
        'status',
        'title',
        'precautions'
    ];
}
