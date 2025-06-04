<?php

namespace Database\Seeders;

use App\Models\BusLine;
use Illuminate\Database\Seeder;

class BusLineSeeder extends Seeder
{
    public function run(): void
    {
        BusLine::create([
            'line_number' => '101',
            'line_name' => 'عمان - الزرقاء',
            'start_station' => 'وسط البلد',
            'end_station' => 'محطة الزرقاء',
            'ticket_price' => 0.50,
            'frequency_minutes' => 15,
            'start_time' => '06:00:00',
            'end_time' => '22:00:00',
            'status' => 'active',
        ]);

        BusLine::create([
            'line_number' => '102',
            'line_name' => 'عمان - إربد',
            'start_station' => 'الجبيهة',
            'end_station' => 'محطة إربد',
            'ticket_price' => 1.00,
            'frequency_minutes' => 30,
            'start_time' => '07:00:00',
            'end_time' => '21:00:00',
            'status' => 'active',
        ]);
    }
}