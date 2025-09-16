<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Amenity;
use App\Models\Room;
use App\Models\Space;
use Illuminate\Database\Seeder;

class SpaceRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
            Space::factory(fake()->numberBetween(2, 3))->create()->each(function ($space) {
                Room::factory(fake()->numberBetween(3, 5))->create(['space_id' => $space->id])->each(function ($room) {
                    $room->amenities()->attach(
                        Amenity::inRandomOrder()->limit(fake()->numberBetween(1, 5))->pluck('id')
                    );
            });
        });
    }
}


