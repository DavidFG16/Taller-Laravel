<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

class Member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory, SotfDeletes;
}

    protected $table = "members";

    protected $fillable[
        'user_id',
        'plan_id',
        'company',
        'joined_at'
    ]

    protected $casts = [
        'joined_at' => 'datetime',
    ];


public function user(){
    return $this->belongsTo(User::class);
}

public function plan(){
    return $this->belongsTo(Plan::class);
}

public function bookings()
{
    return $this->hasMany(Booking::class);
}