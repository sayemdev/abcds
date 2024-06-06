<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeVisit extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'lat',
        'lng',
        'zoom_level',
        'visit_date',
        'attach',
        'read',
        'status',
        'branch_id',
        'visit_address',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
