<?php

namespace Database\Seeders;

use App\Models\StopImage;
use Illuminate\Database\Seeder;

class StopImageSeeder extends Seeder
{
    public function run(): void
    {
        StopImage::create([
            'stop_id' => 1, // افترض أن ID محطة وسط البلد هو 1
            'user_id' => 1, // افترض أن ID المستخدم أحمد هو 1
            'image_url' => 'https://example.com/images/stop_downtown.jpg',
            'caption' => 'صورة محطة وسط البلد',
            'is_approved' => true,
        ]);

        StopImage::create([
            'stop_id' => 2, // افترض أن ID محطة الجبيهة هو 2
            'user_id' => 2, // افترض أن ID المستخدم فاطمة هو 2
            'image_url' => 'https://example.com/images/stop_jubeiha.jpg',
            'caption' => 'صورة محطة الجبيهة ليلاً',
            'is_approved' => false,
        ]);
    }
}