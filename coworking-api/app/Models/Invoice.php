<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;
}

 protected $fillable = [
        'payment_id',
        'number',
        'issued_date',
        'meta'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }