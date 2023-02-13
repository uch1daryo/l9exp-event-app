<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TestDatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
    }
}
