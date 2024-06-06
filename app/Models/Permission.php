<?php

namespace App\Models;

use App\Models\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
