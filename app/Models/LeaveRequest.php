<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'leave_id',
        'employee_id',
        'from',
        'to',
        'reason',
        'status',
    ];

    public function leaveSetting()
    {
        return $this->belongsTo(LeaveSetting::class, 'leave_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
