<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'phone',
        'email',
        'address',
        'gender',
        'dob',
    ];

    public function homeVisits()
    {
        return $this->hasMany(HomeVisit::class);
    }

    protected static function boot()
{
    parent::boot();

    // Generate code automatically before creating a new record
    static::creating(function ($patient) {
        do {
            $code = now()->format('Ymd') . str_pad(random_int(0, 99999), 5, '0', STR_PAD_LEFT);
        } while (static::where('code', $code)->exists());

        $patient->code = $code;
    });
}
}
