<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class TestDatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3; $i++) {
            $user = User::factory()->create();
            Event::create([
                'user_id' => $user->id,
                'start_at' => now(),
                'end_at' => now()->addHour(1),
            ]);
        }
    }
}
