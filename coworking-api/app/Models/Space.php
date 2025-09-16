<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Space extends Model
{
    /** @use HasFactory<\Database\Factories\SpaceFactory> */
    use HasFactory;


protected $table = "spaces";

 protected $fillable = [
        'name',
        'address',
    ];

public function room(){
    return $this->hasMany(Room::class);
}}