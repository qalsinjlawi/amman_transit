<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BusStop;
use App\Models\ChatMessage;

class ChatTestSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'aa@example.com'],
            ['name' => 'مستخدم تجريبي', 'password' => bcrypt('password')]
        );

        $stop = BusStop::firstOrCreate(
    ['id' => 3],
    [
        'stop_name' => 'محطة تجريبية',
        'latitude' => 31.963158,   // أدخل إحداثيات فعلية أو تجريبية
        'longitude' => 35.930359
    ]
);

        ChatMessage::create([
            'stop_id' => $stop->id,
            'user_id' => $user->id,
            'message_type' => 'text',
            'content' => 'مرحبا بالجميع في هذه المحطة!',
        ]);
    }
}
