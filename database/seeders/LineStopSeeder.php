<?php

namespace Database\Seeders;

use App\Models\LineStop;
use Illuminate\Database\Seeder;

class LineStopSeeder extends Seeder
{
    public function run(): void
    {
        LineStop::create([
            'line_id' => 1, // افترض أن ID خط عمان-الزرقاء هو 1
            'stop_id' => 1, // افترض أن ID محطة وسط البلد هو 1
            'stop_order' => 1,
            'direction' => 'forward',
            'arrival_time_offset' => 0,
        ]);

        LineStop::create([
            'line_id' => 1, // نفس الخط
            'stop_id' => 2, // افترض أن ID محطة الجبيهة هو 2
            'stop_order' => 2,
            'direction' => 'forward',
            'arrival_time_offset' => 10,
        ]);

        LineStop::create([
            'line_id' => 2, // افترض أن ID خط عمان-إربد هو 2
            'stop_id' => 2, // محطة الجبيهة
            'stop_order' => 1,
            'direction' => 'forward',
            'arrival_time_offset' => 0,
        ]);
    }
}