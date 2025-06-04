<?php

namespace Database\Seeders;

use App\Models\BusStop;
use Illuminate\Database\Seeder;

class BusStopSeeder extends Seeder
{
    public function run(): void
    {
        BusStop::create([
            'stop_name' => 'محطة وسط البلد',
            'latitude' => 31.9539,
            'longitude' => 35.9106,
            'address' => 'شارع الملك فيصل، عمان',
            'area' => 'وسط البلد',
            'status' => 'active',
            'operating_hours' => '24/7',
        ]);

        BusStop::create([
            'stop_name' => 'محطة الجبيهة',
            'latitude' => 32.0153,
            'longitude' => 35.8722,
            'address' => 'شارع الجامعة، الجبيهة',
            'area' => 'الجبيهة',
            'status' => 'active',
            'operating_hours' => '24/7',
        ]);
    }
}