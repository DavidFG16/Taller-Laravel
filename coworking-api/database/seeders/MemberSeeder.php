<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Member;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(fake()->numberBetween(5, 10))->create()->each(function ($user) {
            Member::factory()->create([
                'user_id' => $user->id,
                'plan_id' => Plan::inRandomOrder()->first()->id,
            ]);
        });
    }
}
