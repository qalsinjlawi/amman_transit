<?php

namespace Database\Seeders;

use App\Models\ChatMessage;
use Illuminate\Database\Seeder;

class ChatMessageSeeder extends Seeder
{
    public function run(): void
    {
        ChatMessage::create([
            'stop_id' => 1, // افترض أن ID محطة وسط البلد هو 1
            'user_id' => 1, // افترض أن ID المستخدم أحمد هو 1
            'message_type' => 'text',
            'content' => 'هل الحافلة متأخرة اليوم؟',
            'image_url' => null,
            'reply_to_message_id' => null,
            'is_hidden' => false,
        ]);

        ChatMessage::create([
            'stop_id' => 1, // نفس المحطة
            'user_id' => 2, // افترض أن ID المستخدم فاطمة هو 2
            'message_type' => 'text',
            'content' => 'لا، الحافلة في موعدها.',
            'image_url' => null,
            'reply_to_message_id' => 1, // رد على الرسالة الأولى
            'is_hidden' => false,
        ]);

        ChatMessage::create([
            'stop_id' => 2, // افترض أن ID محطة الجبيهة هو 2
            'user_id' => 1, // المستخدم أحمد
            'message_type' => 'image',
            'content' => 'صورة للمحطة',
            'image_url' => 'https://example.com/images/stop_image.jpg',
            'reply_to_message_id' => null,
            'is_hidden' => false,
        ]);
    }
}