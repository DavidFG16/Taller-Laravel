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
        $rooms = Room::all();
        $members = Member::all();

        foreach ($rooms as $room) {

            $numBookings = fake()->numberBetween(3, 6);

            for ($i = 0; $i < $numBookings; $i++) {
                $memberId = $members->random()->id;

                do {
                    $start = fake()->dateTimeBetween('+1 day', '+10 days');
                    $end = (clone $start)->modify('+2 hours');

                    $solapamiento = Booking::where('room_id', $room->id)
                        ->where(function ($q) use ($start, $end) {
                            
                            $q->whereBetween('start_at', [$start, $end])
                              ->orWhereBetween('end_at', [$start, $end]);
                        })
                        ->exists();
                } while ($solapamiento); 

                $booking = Booking::factory()->create([
                    'member_id' => $memberId,
                    'room_id' => $room->id,
                    'start_at' => $start,
                    'end_at' => $end,
                    'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled']),
                    'purpose' => fake()->sentence(3),
                ]);

                if (fake()->boolean(70)) {
                    Payment::factory()->create([
                        'booking_id' => $booking->id,
                    ]);
                }
            }
        }
    }
}