<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulturePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'culture_id',
        'price',
    ];

    // Define the relationship with the Culture model
    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }
}
