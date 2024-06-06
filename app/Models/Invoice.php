<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'branch_id',
        'doctor_id',
        'contract_id',
        'date',
        'discount',
        'paid',
        'status',
        'barcode',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function invoiceTests()
    {
        return $this->hasMany(InvoiceTest::class);
    }
    public function tests()
    {
        return $this->belongsToMany(Test::class, 'invoice_tests')->withPivot('price');
    }

    public function cultures()
    {
        return $this->belongsToMany(Culture::class, 'invoice_tests')->withPivot('price');
    }

    public static function generateUniqueBarcode($userId)
    {
        do {
            $barcode = str_pad($userId, 8, '0', STR_PAD_LEFT) . Str::random(6);
        } while (self::where('barcode', $barcode)->exists());

        return $barcode;
    }
}
