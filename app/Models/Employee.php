<?php

namespace App\Models;
use App\Models\Department;
use App\Models\Designation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'employee_id',
        'email',
        'mobile',
        'profile',
        'join_date',
        'end_date',
        'password',
        'branch',
        'designation',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

}
