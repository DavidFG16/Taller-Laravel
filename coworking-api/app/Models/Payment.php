<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;
}

protected $table = "payments";

 protected $fillable = [
        'booking_id',
        'method',
        'amount',
        'status'
    ];


public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

public function invoices()
{
    return $this->hasMany(Invoice::class);
}