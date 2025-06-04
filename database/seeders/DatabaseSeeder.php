<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BusLineSeeder::class,
            BusStopSeeder::class,
            LineStopSeeder::class,
            BusScheduleSeeder::class,
            ChatMessageSeeder::class,
            StopImageSeeder::class,
        ]);
    }
}