<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Amenity>
 */
class AmenityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name()
        ];
    }
}



<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Member;
use App\Models\Payment;
use App\Models\Room;
use Illuminate\Database\Seeder;

class BookingPaymentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Obtener todas las salas y miembros existentes
        $rooms = Room::all();
        $members = Member::all();

        // 2. Iterar sobre cada sala
        foreach ($rooms as $room) {
            // 3. Crear 3-6 reservas por sala usando la factory
            Booking::factory()
                ->count(fake()->numberBetween(3, 6))
                ->create([
                    'room_id' => $room->id,
                    'member_id' => fn () => $members->random()->id,
                ])
                // 4. Iterar sobre las reservas creadas
                ->each(function ($booking) {
                    // 5. Crear pago para ~70% de las reservas
                    if (fake()->boolean(70)) {
                        Payment::factory()->create([
                            'booking_id' => $booking->id,
                        ]);
                    }
                });
        }
    }
}