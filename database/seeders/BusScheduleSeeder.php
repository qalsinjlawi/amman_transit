<?php

namespace Database\Seeders;

use App\Models\BusSchedule;
use Illuminate\Database\Seeder;

class BusScheduleSeeder extends Seeder
{
    public function run(): void
    {
        BusSchedule::create([
            'line_id' => 1, // افترض أن ID خط عمان-الزرقاء هو 1
            'departure_time' => '06:00:00',
            'day_type' => 'weekday',
            'direction' => 'forward',
            'is_active' => true,
        ]);

        BusSchedule::create([
            'line_id' => 1, // نفس الخط
            'departure_time' => '06:30:00',
            'day_type' => 'weekday',
            'direction' => 'backward',
            'is_active' => true,
        ]);

        BusSchedule::create([
            'line_id' => 2, // افترض أن ID خط عمان-إربد هو 2
            'departure_time' => '07:00:00',
            'day_type' => 'friday',
            'direction' => 'forward',
            'is_active' => true,
        ]);
    }
}