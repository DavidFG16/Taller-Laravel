<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Space;
use App\Models\Amenity;
use App\Models\AmenityRoom;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;


protected $table = "rooms";

protected $fillable = [
        'space_id',
        'name',
        'capacity',
        'type',
        'is_active'
    ];

public function space(){
    return $this->belongsTo(Space::class);
}

public function booking(){
        return $this->hasMany(Booking::class);
    }


public function amenities(){
    return $this->belongsToMany(Amenity::class)->using(AmenityRoom::class)->withTimeStamps();
} }


