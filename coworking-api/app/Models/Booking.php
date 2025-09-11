<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Room;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;
}

protected $table = "bookings";


protected $hidden = [
        'member_id',
        'room_id',
        'start_at',
        'end_at',
        'status',
        'purpose',
    ];


protected $casts = [
    'start_at' => 'datetime',
    'end_at' => 'datetime'
];

public function member(){
    return $this->belongsTo(Member::class);
}

public function room(){
    return $this->belongsTo(Room::class)
}

public function payments()
{
    return $this->hasMany(Payment::class);
}