<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'test_id',
        'culture_id',
        'price',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }
}
